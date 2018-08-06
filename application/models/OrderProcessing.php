<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderProcessing extends CI_Model {
	public function getOrder($data = array()) {
		$this->load->database();
		$this->db->insert('order_dtl', $data); //this should be done in model
		$query = $this->db->get_where('order_dtl', array('custid' => $data['custid'], 'status' => 'W'));
		//select oid from order_dtl where custid='custid' AND status='W'
		$specs = $query->result();

		if (!empty($_SESSION['shopping_cart'])) {

			foreach ($_SESSION['shopping_cart'] as $key => $product) {
				$orderSpec = array(
					'oid' => $specs[0]->oid,
					'did' => $product['id'],
					'dname' => $product['name'],
					'quantity' => $product['quantity'],
					'price' => $product['price'],
					'spe_inst' => $product['spe_inst'],
				);
				$pos = $this->db->insert('order_spec', $orderSpec);

			}

		}
		$uname = $_SESSION['uname'];
		if ($pos) {
			session_unset();
			session_start();
			$_SESSION['uname'] = $uname;
			session_write_close();
			redirect(base_url() . "index.php/");
		}

	}
}

/* End of file OrderProcessing.php */
/* Location: ./application/models/OrderProcessing.php */