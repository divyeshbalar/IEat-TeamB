<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_model{
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
	public function createMainDish($type,$name,$cost,$description,$image){
		$this->load->database();
		$table = $type."s";
		$lastid = "SELECT did FROM " .$table." ORDER BY did DESC LIMIT 1"; // get the last id in the table to autoincrement it
		$lastid = $this->db->query($lastid);
		$numid = 0;
		if($lastid != NULL){
			foreach($lastid->result() as $value){
				//echo "value = ".$value->did;
				$numid = intval(substr($value->did,1));
				//echo 'numid = '.$numid;
				$numid++;
			}
		}
		$numid = sprintf("%1$03d",$numid);
		switch($type){
			case "pizza":
				$did = "P".$numid;
				break;
			case "poutine":
				$did = "O".$numid;
				break;
			case "calzon":
				$did = "C".$numid;
				break;
			case "lasagna":
				$did = "L".$numid;
				break;
			case "eggplant":
				$did = "E".$numid;
				break;
		}
		$data = array('did'=>$did,'dname'=>$name,'ddesc'=>$description,'price'=>$cost,'image'=>$image);
		$this->db->insert($table,$data);
	}
	public function readMainDish($type,$name){
		$this->load->database();
		$table = $type."s";
		$result = $this->db->get_where($table, array('name' => $name));
		return $result;
	}
	public function updateMainDish($type,$name,$cost,$description,$image){
		$this->load->database();
		$did = '';
		$table = $type."s";
		$dish = $this->db->get_where($table,array('name'=>$name));
		if($dish != NULL){
			foreach($data as $key=>$value){
				if($value->name == $name){
					$did = $value->did; 
				}
			}
			if($did != ''){
				$this->db->where('did',$did);
				$this->db->update($table,array('name' =>$name,'ddesc'=>$description,'price'=>$cost,'image'=>$image));
			}
		}
	}
	public function deleteMainDish($type,$name){
		$this->load->database();
		$did = '';
		$table = $type."s";
		$dish = $this->db->get_where($table,array('name'=>$name));
		if($dish != NULL){
			foreach($data as $key=>$value){
				if($value->name == $name){
					$did = $value->did; 
				}
			}
			if($did != ''){
				$this->db->delete($table,array('did'=>$did));
			}
		}
	}
	public function getDishes($type){
		$this->load->database();
		$table = $type."s";
		$result = $this->db->get($table);
		return $result;
	}
	/*
		Product is an array that comes with the field and value pairs. example name=>'pizza cheese'
	*/
	public function createOrder($uid,$typeorder,$custname,$deliver_address,$apto_number,$zipcode,$city,$phone_number,$instruction,$subtotal,$date,$time,$products=array()){
		$this->load->database();
		$taxes = $this->db->get('tax');
		if($taxes != NULL){
			foreach($taxes as $name=>$value){
				$gst = $value->gst;
				$qst = $value->qst;
			}
		}
		$valgst = ($gst*$subtotal)/100;
		$valqst = ($qst*$subtotal)/100;
		$total = $subtotal + $valgst + $valqst;
		$orderdata = array('custid' =>$uid,'type'=> $typeorder,'cname' => $custname,'del_address' =>$deliver_address,'apptno'=>$apto_number,'zipcode'=>$zipcode,'city'=>$city,
							'phonemo'=>$phone_number,'delInstruction'=>$instruction,'subtotal'=>$subtotal,'gst'=>$valgst,'qst' =>$valqst,'total'=>$total,'date'=>$date,'time'=>$time,
							'status'=>'w');
		$this->db->insert('order_dtl',$orderdata);
		$lastorderid = $this->db->query("SELECT oid FROM order_dtl WHERE 'custid' = ".$uid." ORDER BY oid DESC LIMIT 1");
		if($lastorderid != NULL){
			foreach($lastorderid as $name=>$value){
				$oid = $value->oid;
			}
		}
		$orderspec = array('oid'=>$oid);
		foreach($products as $key=>$value){
			 $orderspec[]= $key=>$value;
		}
		$this->db->insert('order_spec',$orderspec);
	}
	public function readOrders(){
		$this->load->database();
		$result = $this->db->get('order_dtl');
		return $result;
	}
	public function readOrderSpec($oid){
		$this->load->database();
		$result = $this->db->get_where('order_spec',array('oid'=>$oid));
		return $result;
	}
	public function updateOrder($oid,$subtotal,$state){
		$this->load->database();
		$taxes = $this->db->get('tax');
		if($taxes != NULL){
			foreach($taxes as $name=>$value){
				$gst = $value->gst;
				$qst = $value->qst;
			}
		}
		$valgst = ($gst*$subtotal)/100;
		$valqst = ($qst*$subtotal)/100;
		$total = $subtotal + $valgst + $valqst;
		$this->db->where('oid',$oid);
		$this->db->update('order_dtl',array('subtotal'=>$subtotal,'gst'=>$valgst,'qst'=>$valqst,'total'=>$total,'status'=>$state));
	}
	// only updates quantity
	public function updateOrderSpec($oid,$products = array()){
		$this->load->database();
		$result = $this->db->get_where('order_spec',array('oid'=>$oid));
		if($result != NULL){
			foreach($result->result() as $row){
				foreach($products as $id=>$quantity){
					if($row->did == $id){
						$data = array('quantity'=>$quantity);
					}							
				}
			}
			$this->db->update('order_spec',$data,array('oid'=>$oid,'did'=>$id));
		}
	}
	public function deleteOrder($oid){
		$this->load->database();
		$result = $this->db->get_where('order_spec',array('oid'=>$oid));
		if($result != NULL){
			foreach($result as $key => $value){
				if($key == 'did'){
					$this->db->delete('order_spec',array('oid'=>$oid,'did'=>$value));
				}
			}
			$this->db->delete('order_dtl',array('oid'=>$oid));
		}
	}
	public function getRestroTime(){
		$this->load->database();
		$result= $this->db->get('restrotime');
		return $result;
	}
	public function updateRestroTime($day,$startTime,$endTime){
		$this->load->database();
		$result = $this->db->get_where('restrotime',array('day'=>$day));
		if($result != NULL){
			foreach($result as $key =>$value){
				$srno = $value->srno;
			}
			$this->db->where('srno',$srno);
			$this->db->update('restrotime',array('startsfrom'=>$startTime,'endto'=>$endTime));
		}
	}
	public function getTax(){
		$this->load->database();
		$result= $this->db->get('tax');
		return $result;
	}
	public function updateTax($taxname,$taxrate){
		$this->load->database();
		$result= $this->db->get('tax');
		if($result != NULL){
			foreach($result->result() as $row){
				if($taxname == 'gst'){
					$valuetax = $row->gst;
				}else{
					$valuetax = $row->qst;
				}
			}
		}
		$this->db->update('tax',$taxrate,array($taxname=>$valuetax));
	}
	public function readEmployees(){
		$this->load->database();
		$result = $this->db->get('employees');
		return $result;
	}
	public function readEmployee($empid){
		$this->load->database();
		$result = $this->db->get_where('employees',array('empid'=>$empid));
		return $result;
	}
	public function updateEmployee($empid,$passw,$name,$auth){
		$this->load->database();
		$result = $this->db->get_where('employees',array('empid'=>$empid));
		if($result != NULL){
			foreach($result->result() as $employee){
				if($employee->empid == $empid){
					$data = array('passwd'=>$passw,'empname'=>$name,'empperm' =>$auth);
				}
			}
			$this->db->update('employees',$data,array('empid'=>$empid));
		}
	}
	public function createEmployee($empid,$passw,$name,$auth){
		$this->load->database();
		$employee = array('empid'=>$empid,'passwd'=>$passw,'empname'=>$name,'empperm'=>$auth);
		$this->db->insert('employees',$employee);
	}
	public function deleteEmployee($empid){
		$this->load->database();
		$result = $this->db->get_where('employees',array('empid'=>$empid));
		if($result != NULL){
			$this->db->delete('employees',array('empid'=>$empid));
		}
	}
}
?>