<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZipRender extends CI_Model {
	function getZips() {
		$this->load->database();
		$query = $this->db->get('areasofdelivery');

		return $query->result();
	}
}

/* End of file ZipRender.php */
/* Location: ./application/models/ZipRender.php */