<?php

class Job_model extends CI_Model{
    // table is the table name
    private $table='alkal_job';

    // ambil_semua_data get all job data
	public function ambil_semua_data()
	{
		return $this->db->get($this->table);
	}
}
