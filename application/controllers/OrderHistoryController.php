<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderHistoryController extends CI_Controller {

	public function index() {
		session_start();
		$i = 0;
		$this->load->model('ordersrender');
		$this->load->model('ordersdescrender');
		$orderdata['orders'] = $this->ordersrender->getOrders($_SESSION['uname']);
		foreach ($orderdata['orders'] as $key => $value) {
			$orderdata['desc'][$i] = $this->ordersdescrender->getOrders($value->oid);
			// foreach ($orderdata['desc'] as $key => $value) {
			// 	print_r($value->oid);
			// }
			//print_r($orderdata['desc'][$i]); //working perfect till here
			$i++;
		}
		session_write_close();
		$this->load->view('myorders', $orderdata);
	}

}

/* End of file OrderHistory.php */
/* Location: ./application/controllers/OrderHistory.php */