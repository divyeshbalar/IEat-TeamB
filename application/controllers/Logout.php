<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index() {
		session_start();
		if (isset($_SESSION)) {
			unset($_SESSION['uname']);
			session_destroy();
		} else {
			session_destroy();
			//$flag = false;
		}
		unset($flag);
		$this->load->view('welcome_message');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */