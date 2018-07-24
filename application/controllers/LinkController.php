<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LinkController extends CI_Controller {

	public function index() {
		echo "Inside LinkController";
		$this->load->view('welcome_message');
	}

	// function printing($data) {
	// 	echo $data;
	// 	$this->load->view('welcome_message');
	// }

}

/* End of file LinkController.php */
/* Location: ./application/controllers/LinkController.php */