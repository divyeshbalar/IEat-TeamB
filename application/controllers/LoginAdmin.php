<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdmin extends CI_Controller {

	public function index() {
		$this->load->helper('form');
		$this->load->helper('url');
		session_start();
		$funct = $this->input->post('function');
		if($funct == 'login'){
		$uname = $this->input->post('uname');
		$pass = $this->input->post('pass');
		//echo $uname . " ------ " . $pass;
		$this->load->model('loginmodel');
		//$flag = false;
		$data = $this->loginmodel->adminverification($uname, $pass);
		if ($data == null) {
			session_write_close();
			echo "<script>alert('Invalid Username or Password')</script>";
			$this->load->view('admin_view');
			//echo "   Invalid";
		} else {
			foreach ($data as $key => $value) {
				//echo $value->custid;
				$temp = $value->empid;
				$temppass = $value->passwd;
				if ($temp == $uname && $temppass == $pass) {
					$_SESSION['admin'] = $uname;
					session_write_close();
					$this->load->view('dishesview');
				}
			}
		}
		}else{
			if (isset($_SESSION)) {
			unset($_SESSION['admin']);
			session_destroy();
			} else {
				session_destroy();
			//$flag = false;
			}
			unset($flagadmin);
			$this->load->view('admin_view');
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

/* End of file LoginAdmin.php */
/* Location: ./application/controllers/LoginAdmin.php */