<?php

namespace App\Helpers;

class Helper{
    public static function classActiveRouteName($routeName, $class = 'active')
    {
        return is_array($routeName) ?
            (in_array(request()->route()->getName(), $routeName) ? $class : '') :
            (request()->route()->getName() == $routeName ? $class : '');
    }
}