<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuController extends CI_Controller {

	public function index() {

		$this->load->model('menudatarendering');
		$menudata['ddata'] = $this->menudatarendering->getDishes();
		if ($menudata['ddata'] == null) {
			echo "No dishes found!";
			//  else {
			// 	// foreach ($dishdata['ddata'] as $key => $value) {
			// 	// 	//echo $value->custid;
			// 	// 	$did = $value->did;
			// 	// 	$dname = $value->dname;
			// 	// 	$price = $value->price;
			// 	// 	echo "$did is $dname and price is $price";
			// 	}
		}
		$this->load->model('taxrender');
		$menudata['taxdata'] = $this->taxrender->getTax();
		$this->load->view('menu', $menudata);

	}
}

/* End of file MenuController.php */
/* Location: ./application/controllers/MenuController.php */

?>