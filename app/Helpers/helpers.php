<?php

if (!function_exists('isActive')) {
    function isActive($routes, $output = 'active')
    {
        foreach ((array) $routes as $route) {
            if (request()->routeIs($route)) {
                return $output;
            }
        }
        return '';
    }
}

if (!function_exists('str_limit_15')) {
    function str_limit_15($string, $end = '...')
    {
        return \Illuminate\Support\Str::limit($string, 15, $end);
    }
}