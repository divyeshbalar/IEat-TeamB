<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_nav extends CI_Model {
	public function getItems() {
		$this->load->database();
		$query = $this->db->get('section');
		return $query->result();
	}

}

/* End of file Menu_nav.php */
/* Location: ./application/models/Menu_nav.php */