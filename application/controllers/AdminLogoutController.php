<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogoutController extends CI_Controller {

	public function index() {
		session_start();
		unset($_SESSION);
		session_destroy();
		redirect(base_url() . "index.php/welcome");

	}

}

/* End of file AdminLogoutController.php */
/* Location: ./application/controllers/AdminLogoutController.php */