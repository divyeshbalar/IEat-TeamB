<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_model {

	//Section Management
	public function CreateSection($name, $prefix) {
		$this->load->database();
		$this->db->insert('section', array('name' => $name, 'prefix' => $prefix));
		$this->load->dbforge();
		$fields = array('did' => array(
			'type' => 'VARCHAR',
			'constraint' => '5',
		),
			'dname' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'ddesc' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
			),
			'price' => array(
				'type' => 'FLOAT',
			),
			'image' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('did', TRUE);
		$this->dbforge->create_table($name, TRUE);
	}
	public function readSections() {
		$this->load->database();
		$sections = $this->db->get('section');
		return $sections->result();
	}
	// Dishes Management
	public function createMainDish($type, $name, $cost, $description, $image) {
		/*
			CreateMainDish function:
			Inserts a new record on the table of tha dish.
			Inserts a new record on the table of products.
			Type: type of dish - pizza
							   - poutine
						       - lasagna
						       - calzon
						       - eggplant
			Name = name of the dish
			Description = description of the dish
			Cost = price of the dish without taxes
			image = name of the image to be used in the view
		*/
		$this->load->database();
		$sections = $this->db->get_where('section', array('name' => $type));
		if ($sections != NULL) {
			foreach ($sections->result() as $section) {
				$prefix = $section->prefix;
			}
		} else {
			$prefix = '';
		}
		$table = $type;
		$lastid = "SELECT did FROM " . $table . " ORDER BY did DESC LIMIT 1"; // get the last id in the table to autoincrement it
		$lastid = $this->db->query($lastid);
		$numid = 0;
		if ($lastid != NULL) {
			foreach ($lastid->result() as $value) {
				//echo "value = ".$value->did;
				$numid = intval(substr($value->did, 1));
				//echo 'numid = '.$numid;
				$numid++;
			}
		}
		$numid = sprintf("%1$03d", $numid);
		$did = $prefix . $numid;
		$data = array('did' => $did, 'dname' => $name, 'ddesc' => $description, 'price' => $cost, 'image' => $image);
		$this->db->insert($table, $data);
	}
	public function readMainDish($type, $name) {
		$this->load->database();
		$table = $type . "s";
		$result = $this->db->get_where($table, array('name' => $name));
		return $result->result();
	}
	public function updateMainDish($type, $name, $cost, $description, $image) {

		$this->load->database();
		$did = '';
		$table = $type;
		$dish = $this->db->get_where($table, array('dname' => $name));
		if ($dish != NULL) {
			foreach ($dish->result() as $value) {
				if ($value->dname == $name) {
					$did = $value->did;
				}
			}
			if ($did != '') {
				$this->db->where('did', $did);
				$this->db->update($table, array('dname' => $name, 'ddesc' => $description, 'price' => $cost, 'image' => $image));
			}
		}
	}
	public function deleteMainDish($type, $name) {
		$this->load->database();

		$table = $type;
		print_r($table);
		echo $table . "= is table name";
		$dish = $this->db->get_where($table, array('dname' => $name));
		if ($dish != NULL) {
			// $this->db->delete($table, array('dname' => $name));
			$this->db->where('dname', $name);
			$this->db->delete($table);
		}
	}
	public function getDishes($type) {
		$this->load->database();
		$table = $type;
		$result = $this->db->get($table);
		return $result->result();
	}
	//Order Management
	public function createOrder($uid = 'NA', $typeorder = 'NA', $custname = '', $deliver_address = 'NA', $apto_number = 'NA', $zipcode = 'NA', $phone_number = '', $subtotal = '', $date = ' ', $time = ' ', $level = ' ', $products = array()) {
		/*
			Product is an array that comes with the field and value pairs. example name=>'pizza cheese'
		*/

		$this->load->database();
		$taxes = $this->db->get('tax');
		$taxes = $taxes->result();
		if ($taxes != NULL) {
			//print_r($taxes);
			foreach ($taxes as $name => $value) {
				echo $value->gst;
				$gst = $value->gst;
				$qst = $value->qst;
			}
		}
		$valgst = ($gst * $subtotal) / 100;
		$valqst = ($qst * $subtotal) / 100;
		$total = $subtotal + $valgst + $valqst;
		$orderdata = array('custid' => $uid, 'type' => $typeorder, 'cname' => $custname, 'del_address' => $deliver_address, 'apptno' => $apto_number, 'zipcode' => $zipcode,
			'phoneno' => $phone_number, 'subtotal' => $subtotal, 'gst' => $valgst, 'qst' => $valqst, 'total' => $total, 'date' => $date, 'time' => $time, 'status' => $level);
		$this->db->insert('order_dtl', $orderdata);
		$lastorderid = $this->db->query("SELECT oid FROM order_dtl WHERE 'custid' = " . $uid . " ORDER BY oid DESC LIMIT 1");
		if ($lastorderid != NULL) {
			foreach ($lastorderid as $name => $value) {
				$oid = $value->oid;
			}
		}
		$orderspec = array('oid' => $oid);
		foreach ($products as $key => $value) {
			$orderspec[$key] = $value;
		}
		$this->db->insert('order_spec', $orderspec);
	}
	public function readOrders() {
		$this->load->database();
		$result = $this->db->get('order_dtl');
		return $result->result();
	}
	public function readOrderSpec($oid) {
		$this->load->database();
		$result = $this->db->get_where('order_spec', array('oid' => $oid));
		return $result->result();
	}
	public function updateOrder($oid, $state) {
		// only updates quantity , $subtotal as parameter
		$this->load->database();
		// $taxes = $this->db->get('tax');
		// $taxes = $taxes->result();
		// if ($taxes != NULL) {
		// 	foreach ($taxes as $name => $value) {
		// 		$gst = $value->gst;
		// 		$qst = $value->qst;
		// 	}
		// }
		// $valgst = ($gst * $subtotal) / 100;
		// $valqst = ($qst * $subtotal) / 100;
		// $total = $subtotal + $valgst + $valqst;
		$this->db->where('oid', $oid);
		$this->db->update('order_dtl', array('status' => $state));
	}
	public function updateOrderSpec($oid, $products = array()) {
		$this->load->database();
		$result = $this->db->get_where('order_spec', array('oid' => $oid));
		if ($result != NULL) {
			foreach ($result->result() as $row) {
				foreach ($products as $id => $quantity) {
					if ($row->did == $id) {
						$data = array('quantity' => $quantity);
					}
				}
			}
			$this->db->update('order_spec', $data, array('oid' => $oid, 'did' => $id));
		}
	}
	public function deleteOrder($oid) {
		$this->load->database();
		$result = $this->db->get_where('order_spec', array('oid' => $oid));
		if ($result != NULL) {
			foreach ($result as $key => $value) {
				if ($key == 'did') {
					$this->db->delete('order_spec', array('oid' => $oid, 'did' => $value));
				}
			}
			$this->db->delete('order_dtl', array('oid' => $oid));
		}
	}
	// Open Times Management
	public function getRestroTime() {
		$this->load->database();
		$result = $this->db->get('restrotime');
		return $result->result();
	}
	public function updateRestroTime($day, $startTime, $endTime) {
		$this->load->database();
		$result = $this->db->get_where('restrotime', array('day' => $day));
		if ($result != NULL) {
			foreach ($result->result() as $value) {
				if ($value->day == $day) {
					$srno = $value->srno;
				}
			}
			$this->db->where('srno', $srno);
			$this->db->update('restrotime', array('startsfrom' => $startTime, 'endto' => $endTime));
		}
	}
	// Tax Management
	public function getTax() {
		$this->load->database();
		$result = $this->db->get('tax');
		return $result->result();
	}
	public function updateTax($taxname, $taxrate) {
		$this->load->database();
		$result = $this->db->get('tax');
		if ($result != NULL) {
			foreach ($result->result() as $row) {
				if ($taxname == 'gst') {
					$valuetax = $row->gst;
				} else {
					$valuetax = $row->qst;
				}
				$this->db->where(array($taxname => $valuetax));
			}
		}
		$data = array($taxname => $taxrate);
		$this->db->update('tax', $data);
	}
	// Employee Management
	public function readEmployees() {
		$this->load->database();

		$sql = "SELECT * FROM cust WHERE level = 'A' OR level = 'E' OR level = 'S'";
		$result = $this->db->query($sql);

		return $result->result();
	}
	public function readEmployee($empid) {
		$this->load->database();
		$result = $this->db->get_where('cust', array('custid' => $empid));
		return $result->result();
	}
	public function updateEmployee($empid, $passw, $name, $auth) {
		$this->load->database();
		$result = $this->db->get_where('cust', array('custid' => $empid));
		if ($result != NULL) {
			foreach ($result->result() as $employee) {
				if ($employee->custid == $empid) {
					$data = array('passwd' => $passw, 'custname' => $name, 'level' => $auth);
				}
			}
			$this->db->update('cust', $data, array('custid' => $empid));
		}
	}
	public function createEmployee($empid, $passw, $name, $auth) {
		$this->load->database();
		$employee = array('custid' => $empid, 'passwd' => $passw, 'custname' => $name, 'level' => $auth);
		$this->db->insert('cust', $employee);
	}
	public function deleteEmployee($empid) {
		// $this->load->database();
		// $result = $this->db->get_where('cust', array('custid' => $empid));
		// if ($result != NULL) {
		// 	$this->db->delete('cust', array('custid' => $empid));
		// }
		$this->load->database();
		$result = $this->db->get_where('cust', array('custid' => $empid));
		if ($result != NULL) {
			foreach ($result->result() as $employee) {
				if ($employee->custid == $empid) {
					$data = array('level' => 'C');
				}
			}
			$this->db->update('cust', $data, array('custid' => $empid));
		}

	}
	//Area of delivery Management
	public function readAreasOfDelivery() {
		$this->load->database();
		$result = $this->db->get('areasofdelivery');
		return $result->result();
	}
	public function getPriceArea($zipcode) {
		$this->load->database();
		$result = $this->db->get_where('areasofdelivery', array('zipcode' => $zipcode));
		if ($result != NULL) {
			foreach ($result->result() as $row) {
				$price = $row->price;
			}
		}
		return $price;
	}
	public function CreateAreaOfDelivery($zipcode, $price) {
		$this->load->database();
		$this->db->insert('areasofdelivery', array('zipcode' => $zipcode, 'price' => $price));
	}
	public function UpdateAreaOfDelivery($zipcode, $price) {
		$this->load->database();
		$result = $this->db->get_where('areasofdelivery', array('zipcode' => $zipcode));
		if ($result != NULL) {
			$this->db->update('areasofdelivery', array('price' => $price), array('zipcode' => $zipcode));
		}
	}
	public function DeleteAreaOfDelivery($zipcode) {
		$this->load->database();
		$result = $this->db->get_where('areasofdelivery', array('zipcode' => $zipcode));
		if ($result != NULL) {
			$this->db->delete('areasofdelivery', array('zipcode' => $zipcode));
		}
	}
}
?>