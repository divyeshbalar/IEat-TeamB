<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginControl extends CI_Controller {

	public function index() {
		$this->load->helper('form');
		$this->load->helper('url');
		session_start();
		$uname = $this->input->post('uname');
		$pass = $this->input->post('pass');
		//echo $uname . " ------ " . $pass;
		$this->load->model('loginmodel');
		//$flag = false;
		$data = $this->loginmodel->loginverification($uname, $pass);
		if ($data == null) {

			session_write_close();
			echo "<script>alert('Invalid Username or Password')</script>";
			$this->load->view('welcome_message');
			//echo "   Invalid";

		} else {
			foreach ($data as $key => $value) {
				//echo $value->custid;
				$temp = $value->custid;
				$temppass = $value->passwd;
				if ($temp == $uname && $temppass == $pass) {
					$_SESSION['uname'] = $uname;
					session_write_close();
					$this->load->view('welcome_message');
				}
				//echo "   valid";
				// else {
				// 	session_write_close();
				// 	echo "<script>alert('Invalid Username or Password')</script>";
				// 	$this->load->view('welcome_message');
				// 	//echo "   Invalid";
				// }
			}
		}
		// echo "$data is flag value";
		// if ($flag == false) {
		// 	$_SESSION['uname'] = "Invalid Username or Password";
		// 	echo "Invalid";
		// } else if ($flag == true) {
		// 	$_SESSION['uname'] = $uname;
		// 	echo "valid";
		// }

	}

}

/* End of file LoginControl.php */
/* Location: ./application/controllers/LoginControl.php */