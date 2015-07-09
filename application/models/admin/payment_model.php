<?php  
class Payment_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}

	public function getAllPaymentDetails(){
		$sql = "select * from tbl_payments";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res) return $res;
		else return false;
	}

	public function getDetails($id){
		$sql = "select * from tbl_payments where id = $id";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		if($res) return $res;
		else return $res;
	}


	public function getPrevious($cur_id){
		$sql = "SELECT id FROM tbl_payments WHERE id < $cur_id ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		if($res) return $res; 
		else return $res;
	}

	public function getNext($cur_id){
		$sql = "SELECT id FROM tbl_payments WHERE id > $cur_id ORDER BY id LIMIT 1;";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		if($res) return $res; 
		else return $res;
	}


	public function edit($id){
		$data = array(
			'user_name' 		=> $this->input->post('user_name',TRUE),
			'package_name'		=> $this->input->post('package_name',TRUE),
			'package_amount'	=> $this->input->post('amount',TRUE),
			'created_date' 		=> $this->input->post('created_date',TRUE),
			'updated_date'		=> date('Y-m-d'),
			'status'			=> $this->input->post('status',TRUE),
		);

		$id = $this->input->post('id',TRUE);
		$this->db->where('id',$id);
		$this->db->update('tbl_payments',$data);
	}

	public function delete($id){
		$this->db->delete('tbl_payments',array('id'=>$id));
	}

	public function changestatus($id){
		$this->db->set('status', '1', FALSE);
		$this->db->where('id', $id);
		$this->db->update('tbl_payments');
	}

	public function getInvoiceNumber($id){
		$sql = "select user_id, invoice_number from tbl_payments where id= $id";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		if($res) return $res; 
		else return $res;
	}

	public function getUserName($u_id){
	        $sql    = "select first_name,middle_name,last_name,email from tbl_user where id=$u_id";
	        $query  = $this->db->query($sql);
	        $res    = $query->row_array();
	        if($res) return $res;
	        else return false;  
    }

    public function markascomplete($id){
    	$this->db->where('id',$id);	
    	$this->db->update('tbl_payments',array('markascompleted' => 1));
    }

    public function issuerefund($id){
    	$this->db->where('id',$id);	
    	$this->db->update('tbl_payments',array('issuerefund' => 1));
    }

    public function getPaymentDetails($id){
    	$sql 	= "select * from tbl_payments where id = $id";
    	$query 	= $this->db->query($sql);
    	$res 	= $query->row_array();
    	if($res) return $res;
    	else return false;
    }

    public function save(){
    	$data = array(
    			'card_number' 			=> $this->input->post('card_number',true),
    			'card_expiry_date'		=> $this->input->post('card_expiry_date',true),
    			'cvv'					=> $this->input->post('cvv',true),
    			'updated_date'			=> date('yy-mm-dd')
    	);
    	
    	$id = $this->input->post('id',true);
    	$this->db->where('id',$id);
    	$this->db->update('tbl_payments',$data);
    }


}

?>
