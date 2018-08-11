<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserprofileControl extends CI_Controller {

	public function index() {
		$this->load->model('UserprofileModel');
		$items['profile_data'] = $this->UserprofileModel->getProfile();
		//load view
		$this->load->view('userprofile', $items);
	}

}

/* End of file UserprofileControl.php */
/* Location: ./application/controllers/UserprofileControl.php */