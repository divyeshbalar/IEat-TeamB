<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CancelOrderController extends CI_Controller {

	public function index() {
		session_start();
		if (isset($_GET['action'])) {
			$oid = $this->input->get('action');
			$date = $this->input->get('date');

			$todate = date('m/d/Y h:i:s a', time());
			echo "<pre><h1>" . $date . "</h1>      " . $todate . "</pre>";
			if ($date < $todate) {
				//echo "date is from past";substr($todate, 0, 10)
				$_SESSION['errormsg'] = "You can not cancel order from past";
				session_write_close();
				redirect(base_url() . "index.php/orderhistorycontroller");
			} else if ($date == $todate) {
				$_SESSION['errormsg'] = "You have to cancel the order before 24hr of delivery/pickup.";
				session_write_close();
				redirect(base_url() . "index.php/orderhistorycontroller");
			} else {
				$this->load->model('cancelorder');
				$this->cancelorder->cancelIt($oid);
				$_SESSION['errormsg'] = "Order has been cancelled successfully.";
				session_write_close();
				redirect(base_url() . "index.php/orderhistorycontroller");
			}

			// $_SESSION['errormsg'] = "Order Cancelled Successfully.";
			// redirect(base_url() . "index.php/orderhistorycontroller");

			// $_SESSION['errormsg'] = "Something went wrong. Try again.";
			// redirect(base_url() . "index.php/orderhistorycontroller");

		}
	}
}

/* End of file CancelOrderController.php */
/* Location: ./application/controllers/CancelOrderController.php */