<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * Os cookies que devem ser ignorados pela criptografia.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
