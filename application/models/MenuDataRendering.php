<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuDataRendering extends CI_Model {
	public function getDishes() {
		$this->load->database();
		$query = $this->db->get('pizzas');

		return $query->result();
	}
}

/* End of file MenuDataRendering.php */
/* Location: ./application/models/MenuDataRendering.php */