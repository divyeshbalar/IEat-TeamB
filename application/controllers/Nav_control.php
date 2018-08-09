<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav_control extends CI_Controller {

	public function index() {

		$this->load->model('menu_nav');
		$items['nav_data'] = $this->menu_nav->getItems();
		if (isset($_GET['section'])) {
			$section = $_GET['section'];
			$this->load->model('menu_nav');
			$menudata['navdata'] = $this->menu_nav->getItems();
			$this->load->model('itemdb');
			$this->load->model('taxrender');
			$menudata['taxdata'] = $this->taxrender->getTax();
			$menudata['ddata'] = $this->itemdb->getDishes($section);
			$this->load->view('menu', $menudata);
		}

	}

}

/* End of file Nav_control.php */
/* Location: ./application/controllers/Nav_control.php */