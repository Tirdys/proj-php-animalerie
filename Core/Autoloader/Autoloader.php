<?php

namespace Core\Autoloader;

class Autoloader{

    /**
     * Charge la class nécessaire grâce au nom récupéré par Class
     * et au namespace
     *
     * @param string $class
     */
    public static function autoload ($class){
        $class = str_replace('\\', '/', $class);
        require  ROOT . '/'. $class . '.php';
    }

    /**
     * Lance la fonction autoloader et lui passe les paramètres nécessaires
     */
    public static function register (){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}