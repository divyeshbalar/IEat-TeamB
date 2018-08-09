<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemDb extends CI_Model {
	public function getDishes($section = '') {
		$this->load->database();
		$query = $this->db->get($section);

		return $query->result();
	}

}

/* End of file ItemDb.php */
/* Location: ./application/models/ItemDb.php */