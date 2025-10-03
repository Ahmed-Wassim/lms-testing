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
