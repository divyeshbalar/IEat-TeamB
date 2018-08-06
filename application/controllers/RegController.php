<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegController extends CI_Controller {

	public function index() {
		if ($this->input->post('action') == 'Register') {

			$custid = $this->input->post('uname');
			$email = $this->input->post('email');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$passwd = $this->input->post('pass');
			$varcode = rand(10000, 99999);

			$data = array(
				'custid' => $custid,
				'passwd' => $passwd,
				'custname' => $fname . " " . $lname,
				'custemail' => $email,
				'vcode' => $varcode,
			);

			$this->db->insert('cust', $data);
			session_start();
			$_SESSION['errormsg'] = "Registration successful.";
			session_write_close();
			$this->load->view('welcome_message');
		}
	}

}

/* End of file RegController.php */
/* Location: ./application/controllers/RegController.php */