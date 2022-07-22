<?php
  class Balance {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function update($data){
    	$this->db->query('UPDATE users set balance = ( balance + :balance) WHERE id = :id');
    	$this->db->bind(':id', $data['id']);
    	$this->db->bind(':balance', $data['amount']);
    	//Execute
	      if($this->db->execute()){
	        return true;
	      } else {
	        return false;
	      }
    }

    public function reduce($data){
        $this->db->query('UPDATE users set balance = ( balance - :balance) WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':balance', $data['amount']);
        //Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }
}

?>