<?php

namespace App\Controller;

use App\Model\OptionsModel;
use Core\Model\DbInterface;
use App\Model\PropertyModel;
use Core\Controller\Controller;

class PropertyController extends Controller{

    public function __construct()
    {
        $this->PropertyModel = new PropertyModel();
        $this->OptionsModel = new OptionsModel();
        $this->dbInterface = new DbInterface();
        
    }

    public function home(){
        $biens = $this->PropertyModel->findAll();
        return $this->render("Property/indexView", [
            'biens' => $biens,
            ]);
    }

    public function newProperty(){

        if(!empty($_POST)){
            $property = array_splice($_POST, 0, 6);
            $options = $_POST["options"];

            $this->dbInterface->save($property, 'property');
            $propertyId = $this->PropertyModel->findOneBy(["title" => $property["title"]]);
            $propertyId = $propertyId->id;

            foreach ($options as $option) {
                $this->dbInterface->save(["option_id" => $option, "property_id" => $propertyId], 'optionsProperty');
            }
            return $this->redirectToRoute('home');
            
        }
        $options = $this->OptionsModel->findAll(); 
        return $this->render("Property/newView", ["options" => $options]);
    }


    public function single()
    {
        $bien = $this->PropertyModel->find($_GET["id"]);
        return $this->render("Property/singleView", ['bien' => $bien]);
    }

    public function modify()
    {
        if (!empty($_POST)) {
            $this->dbInterface->update('property', $_POST, $_GET["id"]);
            return $this->redirectToRoute('singleProperty', $_GET["id"]);
        }
        $bien = $this->PropertyModel->find($_GET["id"]);
        return $this->render("Property/modifyView", ['bien' => $bien]);
    }

    public function delete()
    {
        return $this->redirectToRoute('home');
    }
}