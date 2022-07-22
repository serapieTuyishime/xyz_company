<?php
	class Balances extends Controller{

		public function __construct(){
	      $this->balanceModel = $this->model('Balance');
	    }

	    public function update($id){
	    	// Check if there is a form submitted
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'balance' => trim($_POST['balance']),
          'balance_err' => '',
        ];

        if(empty($data['balance'])){
              $data['balance_err'] = 'Please enter a balance';       
            }
        elseif($data['balance'] <=0){
		            $data['balance_err'] = 'The update must be above 0';
		        }   

        
        // Make sure errors are empty
        if(empty($data['balance_err'])){

          // easy fix
          $update_data=
          [
            'id'=> $data['id'],
            'amount'=>$data['balance']
          ];

          if($this->balanceModel->update($update_data)){
            // Redirect to users
            flash('register_success', 'Balance updated');
            redirect('users/index');
          } else {
            redirect('pages/load_404');
          }
           
        } else {
          // Load View
          $this->view('balances/update', $data);
        }
      } else {
        // IF NOT A POST REQUEST

        // Init data
        $data = [
          'id' => $id,
          'balance' => '',
           'balance_err' => '',
        ];

        // Load View
        $this->view('balances/update', $data);
      }
	    }
	}
?>