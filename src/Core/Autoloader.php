<?php

namespace App\Core;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function ($class) {
            $classPath = str_replace('App', 'src', $class);
            $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $classPath);
            require_once '..' . DIRECTORY_SEPARATOR . $classPath . '.php';
        });
    }
}
