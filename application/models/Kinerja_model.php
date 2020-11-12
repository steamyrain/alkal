<?php

class Kinerja_model extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('kinerja');
	}

	public function input_data($data)
	{
		$this->db->insert('kinerja', $data);
	}
}