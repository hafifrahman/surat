<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('currentRole')) {
    function currentRole()
    {
        if (Auth::check() && Auth::user()->roles) {
            return Auth::user()->roles->name;
        }
        return null;
    }
}
