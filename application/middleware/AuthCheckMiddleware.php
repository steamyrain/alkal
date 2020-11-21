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
        return;
    }
}
