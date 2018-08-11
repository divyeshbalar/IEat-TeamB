<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserprofileModel extends CI_Model {
	public function getProfile() {

		session_start();

		$var = $_SESSION['uname'];
		$this->load->database();
		$sql = "SELECT custaddress, cellno FROM cust Where custname = ?";
		$query = $this->db->query($sql, $var);

		return $query->result();
	}

}

/* End of file UserprofileModel.php */
/* Location: ./application/models/UserprofileModel.php */