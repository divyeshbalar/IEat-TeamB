<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaxRender extends CI_Model {
	public function getTax() {
		$this->load->database();
		$query = $this->db->get('tax');

		return $query->result();
	}

}

/* End of file TaxRender.php */
/* Location: ./application/models/TaxRender.php */