<?php

namespace App\Controller;

use App\Model\OptionsModel;
use Core\Model\DbInterface;
use Core\Controller\Controller;

class OptionsController extends Controller{
    public function __construct()
    {
        $this->OptionsModel = new OptionsModel();
        $this->dbInterface = new DbInterface();
        
    }

    public function home(){
        
        $options = $this->OptionsModel->findAll();
        return $this->render("Options/indexView", [
            'options' => $options,
            ]);
    }

    public function newOptions(){

        if(!empty($_POST)){
            $this->dbInterface->save($_POST, 'options');
            return $this->redirectToRoute('home');
        }
        return $this->render("Options/newView");
    }


    public function single()
    {
        $option = $this->PropertyModel->find($_GET["id"]);
        return $this->render("Options/singleView", ['option' => $option]);
    }

    public function modify()
    {
        if (!empty($_POST)) {
            $this->dbInterface->update('options', $_POST, $_GET["id"]);
            return $this->redirectToRoute('singleOptions', $_GET["id"]);
        }
        $option = $this->OptionsModel->find($_GET["id"]);
        return $this->render("Option/modifyView", ['option' => $option]);
    }

    public function delete()
    {
        $this->dbInterface->delete('options', $_GET["id"]);
        return $this->redirectToRoute('home');
    }
}