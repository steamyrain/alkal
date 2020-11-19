<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\Route;
use Luthier\Auth\UserInterface;

class AlkalAuthMiddleware extends Luthier\Auth\Middleware
{
    private $username;
    private $password;
    private $role;

    public function preLogin(Route $route) {
        return;
    }    
    
    public function onLoginSuccess(UserInterface $user) {
       redirect(route('dashboard')); 
    }
    
    public function onLoginFailed($username) {
        echo "login failed";
    }

    public function onLoginInactiveUser(UserInterface $user) {
        return;
    }

    public function onLoginUnverifiedUser(UserInterface $user) {
        return;
    }

    public function onLogout() {
        return;
    }
}
