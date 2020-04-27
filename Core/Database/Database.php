<?php

namespace Core\Database;

use Core\Config\Config;

class Database{

    /**
     * Connexion ouverte à la Db
     *
     * @var object
     */
    protected $pdo;

    /**
     * nom de l'host
     *
     * @var string
     */
    private $dbHost;

    /**
     * nom d'utilisateur
     *
     * @var string
     */
    private $dbUser;

    /**
     * Password de connexion
     *
     * @var string
     */
    private $dbPassword;

    /**
     * Port de connexion
     *
     * @var string
     */
    private $dbPort;

    /**
     * nom de la Db
     *
     * @var string
     */
    private $dbName;

    /**
     * Constructeur / établit la connexion avec la Db
     */
    public function __construct($dbName, $dbHost, $dbPort, $dbUser, $dbPassword){

        $this->dbName = $dbName;
        $this->dbHost = $dbHost;
        $this->dbPort = $dbPort;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;

        if(is_null($this->pdo)){
            $this->pdo = new \PDO('mysql:host='. $this->dbHost . ':' . $this->dbPort . 
                                ";dbname=" . $this->dbName , 
                                $this->dbUser, 
                                $this->dbPassword);
        }
        return $this->pdo;
    }

    public function query($statement, $class = null, $one = false){
        $query = $this->pdo->query($statement);

        if(!is_null($class)){
            $query->setFetchMode(\PDO::FETCH_CLASS, $class);
        } else {
            $query->setFetchMode(\PDO::FETCH_OBJ);
        }

        if($one){
            return $query->fetch();
        } else {
            return $query->fetchAll();
        }
    }

    public function prepare ($statement, $data)
    {
        $prepare = $this->pdo->prepare($statement);
        $prepare->execute($data);

    }

    public function exec ($statement)
    {
        return $this->pdo->exec($statement);
    }

}