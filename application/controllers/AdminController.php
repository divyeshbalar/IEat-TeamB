<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	// Order Management
	public function readOrders() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$orders = $this->adminmodel->readOrders();
		if ($orders != NULL) {
			foreach ($orders as $row) {
				$order = array('oid' => $row->oid, 'custid' => $row->custid, 'type' => $row->type, 'cname' => $row->cname,
					'del_address' => $row->del_address, 'apptno' => $row->apptno, 'zipcode' => $row->zipcode,
					'city' => $row->city, 'phoneno' => $row->phoneno, 'delInstruction' => $row->delInstruction,
					'subtotal' => $row->subtotal, 'gst' => $row->gst, 'qst' => $row->qst, 'total' => $row->total,
					'date' => $row->date, 'time' => $row->time, 'status' => $row->status,
				);
				$data[] = $order;
			}
			$data['orders'] = $data;
			$data_aid = array_diff_key($data, array('orders' => $data['orders']));
			$data = array_diff_key($data, $data_aid);
			$this->load->view('adminorders', $data);
		} else {
			$data['orders'] = [];
			$this->load->view('adminorders', $data);
		}
	}
	public function updateOrder() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$oid = $this->input->post('oid');
		$state = $this->input->post('status');
		$this->adminmodel->updateOrder($oid, $state);
		$this->readOrders();
	}

	public function createOrder() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$oid = $this->input->post('custid');
		$type = $this->input->post('type');
		$name = $this->input->post('cname');
		$address = $this->input->post('del_address');
		$apptno = $this->input->post('apptno');
		$zipcode = $this->input->post('zipcode');
		$city = $this->input->post('city');
		$phoneno = $this->input->post('phoneno');
		$subtotal = $this->input->post('subtotal');
		$date = $this->input->post('date');
		$time = $this->input->post('time');
		$state = $this->input->post('status');
		echo $state . " IS status bitch";
		$this->adminmodel->createOrder($oid, $type, $name, $address, $apptno, $zipcode, $phoneno, $subtotal, $date, $time, $state);
		$this->readOrders();
	}
	public function detailOrder() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$oid = $this->input->post('oid');
		$orderspec = $this->adminmodel->readOrderSpec($oid);
		if ($orderspec != NULL) {
			foreach ($orderspec as $row) {
				$specification = array('oid' => $row->oid, 'did' => $row->did, 'dname' => $row->dname, 'quantity' => $row->quantity,
					'price' => $row->price, 'spe_inst' => $row->spe_inst,
				);
				$data[] = $specification;
			}
			$data['specification'] = $data;
			$data_aid = array_diff_key($data, array('specification' => $data['specification']));
			$data = array_diff_key($data, $data_aid);
		} else {
			$data['specification'] = [];
		}
		$this->load->view('adminorderspec', $data);
	}
	public function deleteOrder() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$oid = $this->input->post('oid');
		$this->adminmodel->deleteOrder($oid);
		$this->readOrders();
	}

	//dishes managment
	public function index() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$menu = $this->getMenu();
		$this->load->view('admindishes', $menu);
	}

	public function readDishes() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$sections = $this->adminmodel->readSections();
		if ($sections != NULL) {
			foreach ($sections as $row) {
				$section = array('name' => $row->name);
				$data[] = $section;
			}
			$data['sections'] = $data;
			$data_aid = array_diff_key($data, array('sections' => $data['sections']));
			$data = array_diff_key($data, $data_aid);
		}
		$data['dishes'] = $this->getMenu();
		$this->load->view('admindishes', $data);
	}
	public function createDish() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('AdminModel');
		$dishname = $this->input->post('name');
		$cost = $this->input->post('price');
		$description = $this->input->post('description');
		$type = $this->input->post('type');
		$image = $_FILES['image']['name'];
		$this->AdminModel->CreateMainDish($type, $dishname, $cost, $description, $image);
		echo "<script> alert('Dish added successfully.');</script>";
		$this->readDishes();
	}
	public function updateDish() {

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('AdminModel');
		$dishname = $this->input->post('name');
		//echo "<script>alert('" . $dishname . " is dname')</script>";
		$cost = $this->input->post('price');
		//echo "<script>alert('" . $cost . " is price')</script>";
		$description = $this->input->post('description');
		$type = $this->input->post('dtype');
		$image = $_FILES['image']['name'];
		//echo "<script>alert('" . $image . " is type')</script>";
		//echo "<script>alert('" . $type . " is type')</script>";
		$this->AdminModel->UpdateMainDish($type, $dishname, $cost, $description, $image);
		$this->readDishes();
	}

	public function deleteDish() {

//..............................
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('AdminModel');
		$dishname = $this->input->post('name');
		//echo "<script>alert('" . $dishname . " is dname')</script>";
		//$cost = $this->input->post('price');
		//echo "<script>alert('" . $cost . " is price')</script>";
		//$description = $this->input->post('description');
		$type = $this->input->post('type');
		//$image = $_FILES['image']['name'];
		//echo "<script>alert('" . $image . " is type')</script>";
		//		echo "<script>alert('" . $type . " is type')</script>";
		$this->AdminModel->DeleteMainDish($type, $dishname);
		$this->readDishes();
	}
	public function getMenu() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$sections = $this->adminmodel->readSections();
		if ($sections != NULL) {
			foreach ($sections as $row) {
				$dishes = $this->adminmodel->getDishes($row->name);
				foreach ($dishes as $dish) {
					$data[] = array('p_name' => $dish->dname, 'p_cost' => $dish->price, 'p_desc' => $dish->ddesc, 'image' => $dish->image, 'p_type' => $row->name);
				}
			}
		}
		return $data;
	}
	// Open times management
	public function getOpenhours() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$Open = $this->adminmodel->getRestroTime();
		foreach ($Open as $day) {
			$data[$day->day] = array('start' => $day->startsfrom, 'end' => $day->endto);
		}
		$this->load->view('adminrestrotime', $data);
	}
	public function updateOpen() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$day = $this->input->post('day');
		$startTime = $this->input->post('start');
		$endTime = $this->input->post('end');
		/*foreach($_POST as $key=>$value){
			echo($key." ".$value);
		}*/
		$this->adminmodel->updateRestroTime($day, $startTime, $endTime);
		$this->getOpenhours();
	}
	// Taxes Management
	public function readTaxes() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$tax = $this->adminmodel->getTax();
		if ($tax != NULL) {
			foreach ($tax as $rate) {
				$data['gst'] = $rate->gst;
				$data['qst'] = $rate->qst;
			}
			$this->load->view('admintax', $data);
		} else {
			$data['gst'] = 0.0;
			$data['qst'] = 0.0;
			$this->load->view('admintax', $data);
		}
	}
	public function updateTax() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$taxname = $this->input->post('type');
		if ($taxname == 'gst') {
			$taxrate = $this->input->post('gst');
		} else {
			$taxrate = $this->input->post('qst');
		}
		$this->adminmodel->updateTax($taxname, $taxrate);
		$this->readTaxes();
	}
	// Area of delivery Management
	public function readAreas() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$areas = $this->adminmodel->readAreasOfDelivery();
		if ($areas != NULL) {
			foreach ($areas as $row) {
				$area = array('zipcode' => $row->zipcode, 'price' => $row->price);
				$data[] = $area;
			}
			$data['areas'] = $data;
			//print_r($data);
			$data_aid = array_diff_key($data, array('areas' => $data['areas']));
			//print_r($data_aid);
			$data = array_diff_key($data, $data_aid);
			$this->load->view('adminareaofdelivery', $data);
		} else {
			$this->load->view('adminareaofdelivery');
		}
	}
	public function updateArea() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$zipcode = $this->input->post('zipcode');
		$price = $this->input->post('price');
		$this->adminmodel->UpdateAreaOfDelivery($zipcode, $price);
		$this->readAreas();
	}
	public function createArea() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$zipcode = $this->input->post('zipcode');
		$price = $this->input->post('price');
		$this->adminmodel->CreateAreaOfDelivery($zipcode, $price);
		$this->readAreas();
	}
	public function deleteArea() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$zipcode = $this->input->post('zipcode');
		$this->adminmodel->DeleteAreaOfDelivery($zipcode);
		$this->readAreas();
	}
	// employee Management
	public function readEmployees() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$data['employees'] = $this->adminmodel->readEmployees();
		//	$data['employees'] = $data;

		//print_r($data);
		//$data_aid = array_diff_key($data, array('employees' => $data['employees']));
		//$data = array_diff_key($data, $data_aid);
		$this->load->view('adminemployee', $data);
	}
	public function updateEmployee() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$empid = $this->input->post('userid');
		$passw = $this->input->post('password');
		$name = $this->input->post('name');
		$auth = $this->input->post('authorization');
		$this->adminmodel->updateEmployee($empid, $passw, $name, $auth);
		$this->readEmployees();
	}
	public function createEmployee() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$empid = $this->input->post('userid');
		$passw = $this->input->post('password');
		$name = $this->input->post('name');
		$auth = $this->input->post('authorization');
		$this->adminmodel->CreateEmployee($empid, $passw, $name, $auth);
		$this->readEmployees();
	}
	public function deleteEmployee() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$empid = $this->input->post('userid');
		$this->adminmodel->DeleteEmployee($empid);
		$this->readEmployees();
	}
	// Section Management
	public function readSections() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$sections = $this->adminmodel->readSections();
		if ($sections != NULL) {
			foreach ($sections as $row) {
				$section = array('name' => $row->name, 'prefix' => $row->prefix);
				$data[] = $section;
			}
			$data['sections'] = $data;
			//print_r($data);
			$data_aid = array_diff_key($data, array('sections' => $data['sections']));
			//print_r($data_aid);
			$data = array_diff_key($data, $data_aid);
			$this->load->view('adminsection', $data);
		} else {
			$this->load->view('adminsection');
		}
	}
	public function createSection() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$name = $this->input->post('name');
		$prefix = $this->input->post('prefix');
		$this->adminmodel->CreateSection($name, $prefix);
		$this->readSections();
	}
}

/* End of file LoginAdmin.php */
/* Location: ./application/controllers/LoginAdmin.php */