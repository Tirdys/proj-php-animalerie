<?php

namespace Core\Database;

use Core\Database\Database;

class createDatabase extends Database{


    /**
     * Créé la table correspondante dans la Db
     *
     * @param string $table
     * @param array $champs
     * @param array $foreigns
     */
    public function createTable($table, $champs = [], $foreigns = []){

        $statement = 'CREATE TABLE IF NOT EXISTS '. $table . '(';
        
        foreach ($champs as $key => $value) {
            $statement .= $key . ' ' . $value . ',';
        }
        $statement = substr($statement, 0, -1);
        if (!empty($foreigns)) {
            $statement .= $this->makeForeign($foreigns);
        }
        $statement .= ")";
        $this->pdo->exec($statement);
    }

    public function makeForeign($foreigns)
    {
        $statement = ", ";

        foreach ($foreigns as $key => $value) {
            $statement .= 'FOREIGN KEY(' . $key . ') REFERENCES ' . $value . ',';
        }
        $statement = substr($statement, 0, -1);
        return $statement;
    }
}
