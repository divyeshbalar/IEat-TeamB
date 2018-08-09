<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index() {
		$this->load->helper('form');
		$this->load->helper('url');
		$dishname = $this->input->post('dishname');
		$cost = $this->input->post('cost');
		$description = $this->input->post('description');
		$type = $this->input->post('type');
		$this->AdminModel->CreateMainDish($type,$dishname, $cost,$description,$dishname.'.jpg');
		$this->load->view('Dishesview');
	}

}

/* End of file LoginAdmin.php */
/* Location: ./application/controllers/LoginAdmin.php */