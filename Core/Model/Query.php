<?php

namespace Core\Model;

use Core\Entity\Entity;
use Core\Model\Model;

class Query extends Model
{
    /**
     * Récupérer many|null objets de la Db
     *
     * @return array| null
     */
    public function findAll($order = ["id" => 'ASC'])
    {
       return $this->db->query('SELECT * FROM ' . $this->model . $this->createOrder($order),
                            '\App\Entity\\' . ucfirst($this->model), 
                            false);
        // return $this->entity = new Entity($result, $this->model);
        
    }

    public function find($id)
    {
        return $this->db->query('SELECT * FROM ' . $this->model . ' WHERE id=' . $id,
                            '\App\Entity\\' . ucfirst($this->model),
                            true);
    }

    public function findOneBy($criteria = [])
    {
        return $this->db->query('SELECT * FROM '. $this->model .
                                $this->createWhere($criteria),
                            '\App\Entity\\' . ucfirst($this->model),
                            true);
    }

    public function findBy($criteria = [], $order = ["id" => 'ASC'])
    {
        return $this->db->query('SELECT * FROM '. $this->model .
                                $this->createWhere($criteria)
                                . $this->createOrder($order),
                            '\App\Entity\\' . ucfirst($this->model),
                            false);
    }

}