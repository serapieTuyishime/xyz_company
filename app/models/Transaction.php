<?php
  class Transaction {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    public function startTransaction($data)
    {
    	$this->db->query('INSERT INTO transactions (sender, receiver, amount, category, fee) VALUES(:sender, :receiver, :balance, :category, :fee)');
    	$this->db->bind(':sender', $data['sender']);
    	$this->db->bind(':receiver', $data['receiver']);
    	$this->db->bind(':balance', $data['amount']);
    	$this->db->bind(':category', $data['category']);
    	$this->db->bind(':fee', $data['fee']);

    	$this->db->execute();
    	return $this->db->lastInsertId();
    }
    public function confirmTransaction($id)
    {
    	$this->db->query('UPDATE transactions SET status= :status WHERE id =:id');
    	$this->db->bind('status', true);
    	$this->db->bind('id', $id);

    	return $this->db->execute();
    }

    public function getAll()
    {
      $this->db->query("SELECT * FROM transactions limit 15");

      $row = $this->db->resultset();

      return $row;
    }
    public function getTransByUSer($id)
    {
    	$this->db->query("SELECT * FROM transactions where sender =:sender");
    	$this->db->bind('sender', $id);

      $row = $this->db->resultset();

      return $row;
    }
}
?>
