<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdersDescRender extends CI_Model {
	public function getOrders($oid = '') {
		$this->load->database();
		// $qry = "SELECT * FROM order_spec WHERE oid = '" . $oid . "'";
		$query = $this->db->get_where('order_spec', array('oid' => $oid));
		//$query = $this->db->get_where('order_dtl', array('custid' => $custid));
		// $exe = $this->db->query($qry);
		//$qry1 = "SELECT * FROM order_desc WHERE custid = '" . $custid . "' ORDER BY oid DESC";
		//print_r($query->result());
		return $query->result();
	}
}

/* End of file OrdersDescRender.php */
/* Location: ./application/models/OrdersDescRender.php */