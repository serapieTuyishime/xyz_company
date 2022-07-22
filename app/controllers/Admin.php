<?php
  class Admin extends Controller{
    public function __construct(){
     $this->adminModel = $this->model('Admin_m');
    }
    public function index(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('transactions');
      }

      

      // Check if form submitted
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),        
          'email_err' => '',
          'password_err' => '',       
        ];

        // Check for email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email.';
        }

        // Check for name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name.';
        }

        // Check for user
        if($this->adminModel->findAdminByEmail($data['email'])){
          // User Found
        } else {
          // No User
          $data['email_err'] = 'This email is not registered.';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){

          // Check and set logged in user
          $loggedInUser = $this->adminModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // User Authenticated!
            $this->createUserSession($loggedInUser);
           
          } else 
          {
            $data['password_err'] = 'Password incorrect.';
            // Load View
            $this->view('admin/login', $data);
          }
           
        } else //errors are present
        {
          // Load View
          $this->view('admin/login', $data);
        }

      } else {
        // If NOT a form submitted

        // Init data
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('admin/login', $data);
      }
    }


    // Create Session With Admin Info
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_type'] = 'admin';
      $_SESSION['user_email'] = $user->email; 
      $_SESSION['user_name'] = 'Admin';
      redirect('transactions');
    }
    // Check Logged In
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
}