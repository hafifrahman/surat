<?php

if (!function_exists('currentRole')) {
    function currentRole()
    {
        if (auth()->check() && auth()->user()->roles) {
            return auth()->user()->roles->name;
        }
        return null;
    }
}
