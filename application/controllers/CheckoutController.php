<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutController extends CI_Controller {

	public function index() {
		session_start();
		//echo "Boooooooooooom";
		if (filter_input(INPUT_GET, 'action') == 'checkout') {
			session_write_close();
			$this->load->view('checkout');
		} else {
			session_write_close();
			$this->load->view('welcome_message');
		}
		session_write_close();
//		$this->load->model('menudatarendering');
		//		$menudata['ddata'] = $this->menudatarendering->getDishes();
		//		if ($menudata['ddata'] == null) {
		//			echo "No dishes found!";
		//
		//		}
		//		$this->load->model('taxrender');
		//		$menudata['tax'] = $this->taxrender->getTax();
		//        $this->load->view('menu', $menudata);

	}
}

/* End of file MenuController.php */
/* Location: ./application/controllers/MenuController.php */

?>