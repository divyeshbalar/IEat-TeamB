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
			//validating the zipcode with the list from database
			$zip = $this->input->post('zipcode');
			$zip3 = $zip[0] . $zip[1] . $zip[2];
			foreach ($areasOfDel['ziplist'] as $key => $value) {
				if ($value->zipcode == $zip3) {
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
					'grandtotal' => $_SESSION['grandtotal'],
					'date' => $_SESSION['ddate'],
					'time' => $_SESSION['dtimedis']);
			}
		} else {
			$_SESSION['orderDtl'] = array(
				'uname' => $_SESSION['uname'],
				'type' => $_SESSION['type'],
				'pname' => $this->input->post('pname'),
				'address' => "NA",
				'apptno' => "NA",
				'zipcode' => "NA",
				'city' => "NA",
				'phoneno' => $this->input->post('phoneno'),
				'orderItems' => $_SESSION['shopping_cart'],
				'delInstruction' => $this->input->post('delInstruction'),
				'subtotal' => $_SESSION['subtotal'],
				'gst' => ($_SESSION['subtotal'] * ((int) $_SESSION['GSTval'] / 100)),
				'qst' => ($_SESSION['subtotal'] * ((int) $_SESSION['QSTval'] / 100)),
				'grandtotal' => $_SESSION['grandtotal'],
				'date' => $_SESSION['ddate'],
				'time' => $_SESSION['dtimedis']);
		}

		$data = array(
			'custid' => $_SESSION['orderDtl']['uname'],
			'type' => $_SESSION['orderDtl']['type'][0],
			'cname' => $_SESSION['orderDtl']['pname'],
			'del_address' => $_SESSION['orderDtl']['address'],
			'apptno' => $_SESSION['orderDtl']['apptno'],
			'zipcode' => $_SESSION['orderDtl']['zipcode'],
			'city' => $_SESSION['orderDtl']['city'],
			'phoneno' => $_SESSION['orderDtl']['phoneno'],
			'delInstruction' => $_SESSION['orderDtl']['delInstruction'],
			'subtotal' => $_SESSION['orderDtl']['subtotal'],
			'gst' => $_SESSION['orderDtl']['gst'],
			'qst' => $_SESSION['orderDtl']['qst'],
			'total' => $_SESSION['orderDtl']['grandtotal'],
			'date' => $_SESSION['orderDtl']['date'],
			'time' => $_SESSION['orderDtl']['time'],
			'status' => 'W',
		);
		//Status W(Waiting), D(Done), A(Accepted), R(Rejected).
		$this->load->model('orderprocessing');
		$this->orderprocessing->getOrder($data);
	}

}

/* End of file OrderValidationController.php */
/* Location: ./application/controllers/OrderValidationController.php */