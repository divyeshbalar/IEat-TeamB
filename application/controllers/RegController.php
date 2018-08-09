<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "ViaNettSMS.php";

class RegController extends CI_Controller {

	public function index() {
		if ($this->input->post('action') == 'Register') {
			$Username = "divyeshkumar_balar@outlook.com";
			$Password = "g0pi5";
			$MsgSender = "+14385010470";

			$custid = $this->input->post('uname');
			session_start();
			$_SESSION['tempuname'] = $custid;
			session_write_close();
			$email = $this->input->post('email');
			$fname = $this->input->post('fname');
			// $lname = $this->input->post('lname');
			$passwd = $this->input->post('pass');
			$cellno = $this->input->post('cellno');
			$varcode = rand(10000, 99999);

			$data = array(
				'custid' => $custid,
				'passwd' => $passwd,
				'custname' => $fname,
				'custemail' => $email,
				'vcode' => $varcode,
				'cellno' => $cellno,
			);

			$this->db->insert('cust', $data);
			$Message = "Hey " . $fname . "Your IEat verification code is: " . $varcode;
			$DestinationAddress = "+1" . $cellno;

			$ViaNettSMS = new ViaNettSMS($Username, $Password);
			try
			{
				// Send SMS through the HTTP API
				$Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
				// Check result object returned and give response to end user according to success or not.
				if ($Result->Success == true) {
					$Message = "Message successfully sent!";
				} else {
					$Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
				}

			} catch (Exception $e) {
				//Error occured while connecting to server.
				$Message = $e->getMessage();
			}

			session_start();
			$_SESSION['errormsg'] = "Registration successful.";
			session_write_close();
			$this->load->view('register');
		}

		if ($this->input->post('action') == 'Verify') {
			$vcode = $this->input->post('vcode');
			$custid = $this->input->post('uname');
			//session_start();
			//$custid = $_SESSION['tempuname'];

			$this->load->model('verificationmodel');
			$verify = $this->verificationmodel->verificationcode($vcode, $custid);
			if ($verify == true) {
				session_start();
				$_SESSION['errormsg'] = "Welcome " . $custid . ". Your account is activated.";
				session_write_close();
				redirect('welcome');
			} else {
				echo "<script> prompt('Wrong Verification code!');</script>";
				redirect('registercontroller');
			}

		}
	}

}

/* End of file RegController.php */
/* Location: ./application/controllers/RegController.php */