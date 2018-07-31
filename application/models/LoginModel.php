<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
	public function loginverification($uname = '', $pass = '') {
		$this->load->database();
		$query = $this->db->get_where('cust', array('custid' => $uname, 'passwd' => $pass));
		//$query = $this->db->get('cust');

		// foreach ($query->result() as $row) {
		// 	echo $row->custid;
		// }

		return $query->result();
	}
	public function adminverification($uname = '', $pass = ''){
		$this->load->database();
		$query = $this->db->get_where('cust',array('custid'=>$uname,'passwd' => $pass));
		return $query->result();
	}
}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */