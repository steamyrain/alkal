<?php 

use Luthier\Auth\UserInterface;

class AlkalUser implements UserInterface {
    private $user;
    private $roles;
    private $permissions;

    public function __construct($entity, $roles, $permissions){
        $this->user = $entity;
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    public function getEntity() {
        return $this->user;
    }

    public function getUsername() {
        return $this->user->username;
    }
    
    public function getRoles() {
        return $this->roles;
    }
    
    public function getPermissions() {
        if ($this->permissions === null) {
            return '';
        }
        return $this->permissions;
    }

    public function getFullName() {
        return $this->user->first_name." ".$this->user->last_name;
    }

    public function getUserId() {
        return $this->user->id;
    }

    public function getUserJobId() {
        return $this->user->jobId;
    }
}
