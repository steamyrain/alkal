<?php

class Kinerja_model extends CI_Model{
    private $table='alkal_laporan_kinerja';

	public function tampil_data()
	{
        $this->db->select('alkal_laporan_kinerja.*,alkal_job.job,alkal_users.first_name,alkal_users.last_name');
        $this->db->from($this->table);
        $this->db->join('alkal_job','alkal_job.id = '
            .$this->table.'.jobId'
        );
        $this->db->join('alkal_users','alkal_users.id = '
            .$this->table.'.userId'
        );
		return $this->db->get();
	}

    public function data_user_spesifik($userId) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('userId',$userId);
        $this->db->join('alkal_job','alkal_job.id = '
            .$this->table.'.jobId'
        );
        return $this->db->get();
    }

	public function input_data($data)
	{
		$this->db->insert($this->table, $data);
	}
}
