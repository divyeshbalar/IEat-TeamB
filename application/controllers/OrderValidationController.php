<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class OrderValidationController extends CI_Controller {

	public function index() {
		//print_r($_SESSION['shopping_cart']);

		//Getting all the special instruction for each of the order
		$counting = 0;
		$validArea = false;
		foreach ($_SESSION['shopping_cart'] as $key => $value) {
			//echo $this->input->post('spe_inst' . $counting);
			$_SESSION['shopping_cart'][$key]['spe_inst'] = $this->input->post('spe_inst' . $counting);
			$counting += 1;
		}
		//retriving data from form for pickup or delivery
		if ($_SESSION['type'] == 'delivery') {
			$this->load->model('ziprender');
			$areasOfDel['ziplist'] = $this->ziprender->getzips();
			// foreach ($areasOfDel as $key => $value) {
			// 	echo $value[0]->zipcode;
			// }
			$zip = $this->input->post('zipcode');
			foreach ($areasOfDel['ziplist'] as $key => $value) {
				if ($value->zipcode == $zip) {
					$validArea = true;
					break;
				}
			}

			if ($validArea == false) {
				$_SESSION['errormsg'] = "Sorry! We do not deliver in this area. Dont worry, You can choose pickup :)";
				redirect(base_url() . "index.php/menucontroller/#cart");
			} else {
				$_SESSION['orderDtl'] = array(
					'uname' => $_SESSION['uname'],
					'type' => $_SESSION['type'],
					'pname' => $this->input->post('pname'),
					'address' => $this->input->post('address1'),
					'apptno' => $this->input->post('apptno'),
					'zipcode' => $this->input->post('zipcode'),
					'city' => $this->input->post('city'),
					'phoneno' => $this->input->post('phoneno'),
					'orderItems' => $_SESSION['shopping_cart'],
					'delInstruction' => $this->input->post('delInstruction'),
					'subtotal' => $_SESSION['subtotal'],
					'gst' => ($_SESSION['subtotal'] * ((int) $_SESSION['GSTval'] / 100)),
					'qst' => ($_SESSION['subtotal'] * ((int) $_SESSION['QSTval'] / 100)),
					'grandtotal' => $_SESSION['grandtotal']);
				print_r($_SESSION['orderDtl']);
			}
		} else {
			$_SESSION['orderDtl'] = array(
				'uname' => $_SESSION['uname'],
				'type' => $_SESSION['type'],
				'pname' => $this->input->post('pname'),
				'address' => $this->input->post('address1'),
				'apptno' => $this->input->post('apptno'),
				'zipcode' => $this->input->post('zipcode'),
				'city' => $this->input->post('city'),
				'phoneno' => $this->input->post('phoneno'),
				'orderItems' => $_SESSION['shopping_cart'],
				'delInstruction' => $this->input->post('delInstruction'),
				'subtotal' => $_SESSION['subtotal'],
				'gst' => ($_SESSION['subtotal'] * ((int) $_SESSION['GSTval'] / 100)),
				'qst' => ($_SESSION['subtotal'] * ((int) $_SESSION['QSTval'] / 100)),
				'grandtotal' => $_SESSION['grandtotal']);

			print_r($_SESSION['orderDtl']);
		}

	}

}

/* End of file OrderValidationController.php */
/* Location: ./application/controllers/OrderValidationController.php */