<?php

class Job_model extends CI_Model{
    // table is the table name
    private $table='alkal_job';

    // ambil_semua_data get all job data
	public function ambil_semua_data()
	{
		return $this->db->get($this->table);
	}

    // ambil_job_where get a specific row from db
    public function ambil_job_where($jobId){
        $this->db->where('id',$jobId);
        $this->db->limit(1);
        return $this->db->get($this->table);
    }
}
