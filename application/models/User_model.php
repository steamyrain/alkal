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
        if(isset($user['password'])) {
            $user['password'] = Auth::loadUserProvider('AlkalUserProvider')
                ->hashPassword($user['password']);
        }
        $this->db()->insert('alkal_users',$user);
    }
}
