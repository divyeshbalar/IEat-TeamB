<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller {
	public function __construct() {
		parent::__construct();
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
		echo "<script>alert('" . $dishname . " is dname')</script>";
		$cost = $this->input->post('price');
		echo "<script>alert('" . $cost . " is price')</script>";
		$description = $this->input->post('description');
		$type = $this->input->post('type');
		$image = $_FILES['image']['name'];
		echo "<script>alert('" . $image . " is type')</script>";
		echo "<script>alert('" . $type . " is type')</script>";
		$this->AdminModel->UpdateMainDish($type, $dishname, $cost, $description, $image);
		$this->readDishes();
	}

	public function deleteDish() {

//..............................
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('AdminModel');
		$dishname = $this->input->post('name');
		echo "<script>alert('" . $dishname . " is dname')</script>";
		//$cost = $this->input->post('price');
		//echo "<script>alert('" . $cost . " is price')</script>";
		//$description = $this->input->post('description');
		$type = $this->input->post('type');
		//$image = $_FILES['image']['name'];
		//echo "<script>alert('" . $image . " is type')</script>";
		echo "<script>alert('" . $type . " is type')</script>";
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