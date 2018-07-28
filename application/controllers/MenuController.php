<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuController extends CI_Controller {

	public function index() {

		$this->load->model('menudatarendering');
		$dishdata['ddata'] = $this->menudatarendering->getDishes();
		if ($dishdata['ddata'] == null) {
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
		$this->load->view('menu', $dishdata);

	}
}

/* End of file MenuController.php */
/* Location: ./application/controllers/MenuController.php */

?>