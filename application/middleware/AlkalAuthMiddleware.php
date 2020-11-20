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
        /*
        $currentUser = Auth::user();
        if ($currentUser !== null) {
            $username = $currentUser->getUsername();
            $role = $currentUser->getRoles();
            if($role ==='admin') {
                redirect(route('dashboard')); 
            } else if($role==='user') {
                echo "user";
                //redirect(route('user-dashboard'));
            }
        } else {
               redirect(route('login')); 
        }
         */

        $username = $user->getUsername();
        $role = $user->getRoles();
        if($role === 'admin') {
            redirect(route('dashboard'));
        }
        else if ($role === 'user') {
            redirect(route('dashboard-user'));
        }
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
