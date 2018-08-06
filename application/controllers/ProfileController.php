<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function index() {

		$this->load->view('userprofile');
	}

}

/* End of file ProfileController.php */
/* Location: ./application/controllers/ProfileController.php */