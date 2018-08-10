<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdersRender extends CI_Model {
	public function getOrders($custid = '') {
		$this->load->database();
		$qry = "SELECT * FROM order_dtl WHERE custid = '" . $custid . "' ORDER BY oid DESC LIMIT 5";
		//$query = $this->db->get_where('order_dtl', array('custid' => $custid));
		$exe = $this->db->query($qry);
		//$qry1 = "SELECT * FROM order_desc WHERE custid = '" . $custid . "' ORDER BY oid DESC";
		//print_r($exe->result());
		return $exe->result();
	}
}

/* End of file OrdersRender.php */
/* Location: ./application/models/OrdersRender.php */