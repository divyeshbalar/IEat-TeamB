<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLoginController extends CI_Controller {

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
			$_SESSION['errormsg'] = "Contact Developers, in case you forget your username or password";
			session_write_close();
			redirect(base_url() . "index.php/admincontrol");
			//echo "   Invalid";

		} else {
			foreach ($data as $key => $value) {
				//echo $value->custid;
				$temp = $value->custid;
				$temppass = $value->passwd;
				$varcode = $value->vcode;
				$level = $value->level;
				if ($temp == $uname && $temppass == $pass && ($level == 'A' || $level == 'S' || $level == 'E')) {
					$_SESSION['authorization'] = $level;
					if ($varcode == 1) {
						$_SESSION['adminuname'] = $uname;
						session_write_close();
						redirect(base_url() . "index.php/admincontrol");
					} else {
						$_SESSION['errormsg'] = "Contact Developers, in case you forget your username or password";
						session_write_close();
						redirect(base_url() . "index.php/admincontrol");
					}
				} else {
					$_SESSION['errormsg'] = "Contact Developers, in case you forget your username or password";
					session_write_close();
					redirect(base_url() . "index.php/admincontrol");
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

/* End of file AdminLoginController.php */
/* Location: ./application/controllers/AdminLoginController.php */