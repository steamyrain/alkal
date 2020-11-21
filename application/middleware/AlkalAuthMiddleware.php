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
        $username = $user->getUsername();
        $role = $user->getRoles();
        if($role === 'admin') {
            return redirect(route('dashboard-admin'));
        }
        else if ($role === 'user') {
            return redirect(route('dashboard-user'));
        }
    }
    
    public function onLoginFailed($username) {
        return;
    }

    public function onLoginInactiveUser(UserInterface $user) {
        return;
    }

    public function onLoginUnverifiedUser(UserInterface $user) {
        return;
    }

    public function onLogout() {
        Auth::destroy();
        return redirect(route('homepage'));
    }
}
