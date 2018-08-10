<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CancelOrder extends CI_Model {
	public function cancelIt($oid = '') {
		$this->db->set('status', 'C');
		$this->db->where('oid', $oid);
		if ($this->db->update('order_dtl')) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file CancelOrder.php */
/* Location: ./application/models/CancelOrder.php */