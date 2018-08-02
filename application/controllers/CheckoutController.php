<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutController extends CI_Controller {

	public function index() {
		session_start();
		//echo "Boooooooooooom";
		if (filter_input(INPUT_GET, 'action') == 'checkout') {

			//check the date range from session ddate
			$this->load->model('restaurantstatus');
			$gg = $_SESSION['ddate'];
			$timing = $_SESSION['dtime'];
			echo $gg;
			$ff = substr($gg, 6, 9) . "-" . substr($gg, 0, 2) . "-" . substr($gg, 3, 4);
			$date = $ff;
			$sepparator = '-';
			$parts = explode($sepparator, $date);
			$dayForDate = date("w", mktime(0, 0, 0, (int) $parts[1], (int) $parts[2], (int) $parts[0]));
			echo $dayForDate;

			$data = $this->restaurantstatus->getDates($dayForDate);

			if ($data == null) {
				session_write_close();
				redirect(base_url() . "index.php/menucontroller");
			} else {
				#Here we are checking the timing of the day, user wants the food to get delivered and match it with the restaurant timing
				foreach ($data as $key => $value) {
					//echo $value->custid;
					$begin = $value->startsfrom;
					$close = $value->endto;
					if ((int) $timing >= (int) $begin && (int) $timing <= (int) $close) {
						#echo "Oreder will go ahead as the restaurant timing matches";

						session_write_close();
						$this->load->view('checkout');
					} else {

						$_SESSION['errormsg'] = "Restaurent is not oper during these hours";
						session_write_close();
						redirect(base_url() . "index.php/menucontroller");
					}
				}
			}
			session_write_close();
		}
		session_write_close();
	}
}

/* End of file MenuController.php */
/* Location: ./application/controllers/MenuController.php */