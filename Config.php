<?php

namespace Config;

class Config
{

    public function __construct(){
        $this->config = [
            'dbHost' => 'sql2.freemysqlhosting.net',
            'dbPort' => '3306',
            'dbName' => 'sql2335093',
            'dbUser' =>  'sql2335093',
            'dbPassword' => 'iK3*bK2*'
        ];
    }

    public function getConfig(){
        return $this->config;
    }
    
}