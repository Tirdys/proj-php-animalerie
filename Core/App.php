<?php

namespace Core;

use Core\Config\Config;
use Core\Database\Database;
use Core\Autoloader\Autoloader;

class App{

    private static $_instance;

    private $db_instance;


    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require ROOT . "/Core/Autoloader/Autoloader.php";
        Autoloader::register();
    }

    public function getDb(){
        $config = Config::getInstance(ROOT . "/App/Config/ConfigDb.php");

        if (is_null($this->db_instance)){
            $this->db_instance = new Database($config->get("dbName"), 
                                            $config->get("dbHost"), 
                                            $config->get("dbPort"), 
                                            $config->get("dbUser"), 
                                            $config->get("dbPassword"));
        }
        return $this->db_instance;
    }
}