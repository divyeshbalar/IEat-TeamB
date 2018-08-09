<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificationModel extends CI_Model {
	public function verificationcode($varcode = '', $custid = '') {
		$this->load->database();
		$query = $this->db->get_where('cust', array('vcode' => $varcode, 'custid' => $custid));
		if ($query->result()) {

			$this->db->set('vcode', 'true', FALSE);
			$this->db->where('custid', $custid);
			$this->db->update('cust');
			return true;
		} else {
			return false;
		}
	}
}

/* End of file VerificationModel.php */
/* Location: ./application/models/VerificationModel.php */