<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthCheckMiddleware implements Luthier\MiddlewareInterface
{

    /**
     * Middleware entry point
     *
     * @return void
     */
    public function run($args = [])
    {
        if (empty(Auth::user())){
            return redirect(route('homepage'));
        }
        else if ((Auth::user()->getRoles() !== 'admin') && $this->_rules_admin()){
            return redirect(route('dashboard-user'));
        }
        else if ((Auth::user()->getRoles() !== 'user') && $this->_rules_user()){
            return redirect(route('dashboard-admin'));
        }
        return;
    }

    private function _rules_admin(){
        return (
                    (ci()->route->getName() == 'dashboard-admin') ||
                    (ci()->route->getName() == 'kinerja-admin') ||
                    (ci()->route->getName() == 'kinerja-admin-form') ||
                    (ci()->route->getName() == 'user-table-admin') ||
                    (ci()->route->getName() == 'adduser-admin-form') ||
                    (ci()->route->getName() == 'adduser-admin-input') ||
                    (ci()->route->getName() == 'kinerja-admin-input')
        );
    }

    private function _rules_user(){
        return (
                    (ci()->route->getName() == 'dashboard-user') ||
                    (ci()->route->getName() == 'kinerja-user') ||
                    (ci()->route->getName() == 'kinerja-user-form') ||
                    (ci()->route->getName() == 'kinerja-user-input')
        );
    }
}
