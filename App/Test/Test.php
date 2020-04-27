<?php

namespace App\Test;

use Database\CreateDatabase;

class Test
{
    public function __construct()
    {
        
        $db = new CreateDatabase();
        // $db->create();
        $db->createTable('options', ['id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT', 'name' => 'VARCHAR(50) NOT NULL']);
        $db->createTable('property', ['id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
                                        'title' => 'VARCHAR(100) NOT NULL',
                                        'address' => 'VARCHAR(100) NOT NULL',
                                        'postalCode' => 'VARCHAR(10) NOT NULL',
                                        'surface' => 'INT NOT NULL',
                                        'type' => 'INT NOT NULL',
                                        'floor' => 'INT'
        ]);
        $db->createTable('optionsProperty', 
                            ["id" => "INT PRIMARY KEY NOT NULL AUTO_INCREMENT",
                                            "option_id" => "INT NOT NULL",
                                            "property_id" => "INT NOT NULL"
                            ],
                            ['option_id' => 'options(id)',
                            'property_id' => 'property(id)']
        );
    }
}

