<?php

use Luthier\Auth\UserInterface;
use Luthier\Auth\UserProviderInterface;
use Luthier\Auth\Exception\UserNotFoundException;
use Luthier\Auth\Exception\InactiveUserException;
use Luthier\Auth\Exception\UnverifiedUserException;

class AlkalUserProvider implements UserProviderInterface {
    public function getUserClass() {
        return 'AlkalUser';
    }

    // loadUserByUsername return new AlkalUser object
    final public function loadUserByUsername(
        $username,$password=null){

        // get user from database that matches
        // with the $username parameter
        $user = ci()->db->get_where(
            'alkal_users',
            ['username'=>$username]
        )->result();

        // check if we find user in database
        // or if password is null and doesnt match
        // with the hashed password counterpart
        if(empty($user) || ($password!==null && !$this->verifyPassword($password,$user[0]->{'password'}))){
            throw new UserNotFoundException();
        }

        $userClass = $this->getUserClass();
        $role = $user[0]->{'role'};
        return new $userClass($user[0],$role,null);
    }

    // verifyPassword compare password with its hash counterpart
    public function verifyPassword($password,$hash){
        return password_verify($password,$hash);
    }
 
    // hashPassword turn password into its hash counterpart
    public function hashPassword($password){
        return password_hash($password,PASSWORD_DEFAULT);
    }

    final public function checkUserIsActive(UserInterface $user) {
        if($user->getEntity()->{'active'} == 0)
        {
            throw new InactiveUserException();
        }
    }

    final public function checkUserIsVerified(UserInterface $user) {
        return;
    }
}
