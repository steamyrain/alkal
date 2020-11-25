<?php

class User_model extends CI_Model{
    // table name
    private $table='alkal_users';

    // get all user data
	public function ambil_semua_data()
	{
		return $this->db->get($this->table);
	}

    // add new user
    public function create_user($user){
        $this->db->insert($this->table,$user);
    }
}
