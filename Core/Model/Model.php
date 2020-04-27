<?php

namespace Core\Model;

use Core\App;

class Model{

    protected $model;

    protected $db;

    public function __construct()
    {
        if(is_null($this->model)){
            $class = explode('\\', get_class($this));
            $class = end($class);
            $this->model = strtolower(str_replace('Model', "", $class));
        }

        $app = new App();
        $this->db = $app->getDb();
    }

    public function createWhere($criteria)
    {
        $where = ' WHERE ';
        foreach ($criteria as $key => $value) {
            $where .= $key . ' = "' . $value . '" AND ';
        }
        return substr($where, 0, -4);
    }

    public function createOrder ($order)
    {
        $orderList = ' ORDER BY ';
        foreach ($order as $key => $value) {
            $orderList .= $key . ' ' . $value . ', ';
        }
        return substr($orderList, 0, -2);
    }
}