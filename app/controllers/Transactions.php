<?php
  class Transactions extends Controller{
    public function __construct(){
     $this->transactionModel = $this->model('Transaction');
     $this->userModel = $this->model('user');
     $this->balModel= $this->model('balance');
    }
    public function index()
    {
    	if (!$this->isLoggedIn()) {
            redirect('users/login');
        }

        if ($_SESSION['user_type']=='user') {
            $this->view('transactions/index');
        }
        else  // when it is the admin
        {
            $data= $this->transactionModel->getAll();
            $this->view('transactions/index', $data);
        }
    }
    public function send()
    {
        // Check if POST
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
        // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =
            [
                'user_id'=>$_SESSION['user_id'],
                'receiver'=>trim($_POST['id']),
                'balance'=>trim($_POST['balance']),
                'id_err'=>''
            ];

            // validations
            if (empty($data['receiver']))
            {
                $data['id_err']= "The receiver ID should not be empty";
            }
            elseif ($data['receiver']== $data['user_id']) {
                $data['id_err']= "Sending money to yourself ...really!!!";
            }
            else{
                if($this->userModel->getUserById($data['receiver']))
                {
                    // verified or USER found!
                }
                else
                {
                    $data['id_err']= "No user with such ID";
                }
            }
            // fetch info for the sender
            $sender_data = $this->userModel->getUserById($data['user_id']);

            if (empty($data['balance'])) 
            {
                $data['balance_err']= 'Please enter balance';
            }
            elseif (!preg_match("/^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/",$data['balance']))
            {
                $data['balance_err']= 'Balance should be a valid number';
            }
            elseif (intval($sender_data->balance) <= intval($data['balance'])) {
                $data['balance_err']= 'You only have '.$sender_data->balance.' in your account';
            }


            // check for errors
            if (empty($data['id_err']) && empty($data['balance_err'])) 
            {
                // fetch the category of the money to reduce
                if ($data['balance'] >= 100001)
                {
                    $category= 1;
                    $fee= 1000;
                }
                elseif ($data['balance'] >= 10001) {
                    $category= 2;
                    $fee= 200;
                }
                elseif ($data['balance'] >= 1) {
                    $category= 3;
                    $fee= 0;
                }
                else
                {
                    $category= 4;
                    $fee= 0;
                }
                    $update_data=
                    [
                        'id'=>$data['receiver'],
                        'amount'=>$data['balance']
                    ];
                    $reduction_data= 
                    [
                        'id'=>$data['user_id'],
                        'amount'=>$data['balance']+$fee
                    ];
                    $trans_data= [
                        'sender'=> $data['user_id'],
                        'receiver'=> $data['receiver'],
                        'amount'=> $data['balance'],
                        'category'=>$category,
                        'fee'=>$fee
                    ];

                    // record the transaction
                    $last_id= $this->transactionModel->startTransaction($trans_data);

                    if($this->balModel->update($update_data) &&  $this->balModel->reduce($reduction_data))
                    {
                        // confirm the transaction

                        $this->transactionModel->confirmTransaction($last_id);
                    }
                    flash('register_success', 'Total of '. $reduction_data['amount']. ' has been reducted from your account');

                    redirect('Transactions/myTransactions');
            }
            else
            {
                $this->view('transactions/send', $data);
            }
        }
        else
        {
            $data=[
                'ids'=> [],
                'receiver'=>'',
                'balance'=>'',
                'id_err'=>'',
                'balance_err'=>''
            ];

            $this->view('transactions/send', $data);
        }
    }
    public function myTransactions()
    {
        if (!$this->isLoggedIn()) {
            redirect('users/login');
        }
        $data=
        [
            'user_info'=>$this->userModel->getUserById($_SESSION['user_id']),
            'myTransactions'=>$this->transactionModel->getTransByUSer($_SESSION['user_id'])
        ];
    	$this->view('transactions/byUser', $data);
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

?>