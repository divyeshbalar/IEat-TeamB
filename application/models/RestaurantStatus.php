<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestaurantStatus extends CI_Model {
	public function getDates($day = '') {
		$this->load->database();
		$query = $this->db->get_where('restrotime', array('srno' => $day));
		return $query->result();
	}
}

/* End of file RestaurantStatus.php */
/* Location: ./application/models/RestaurantStatus.php */