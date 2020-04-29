<?php

use App\Controller\OptionsController;
use App\Controller\PropertyController;
use App\Controller\UserController;
use Model\DbInterface;
use Model\PropertyModel;
use Model\OptionsModel;

if ((isset($_GET["page"]) && $_GET["page"] == 'home') || !isset($_GET["page"])) {
    $controller = new PropertyController();
    $controller->home();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'newProperty') { 
    $controller = new PropertyController();
    $controller->newProperty();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'singleProperty') {  
    $controller = new PropertyController();
    $controller->single();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'modifyProperty') { 
    $controller = new PropertyController();
    $controller->modify();
    

} elseif (isset($_GET["page"]) && $_GET["page"] == 'deleteProperty') { 
    $controller = new PropertyController();
    $controller->delete();
}

if ((isset($_GET["page"]) && $_GET["page"] == 'optionsList')) {
    $controller = new OptionsController();
    $controller->home();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'newOptions') {  
    $controller = new OptionsController();
    $controller->newOptions();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'singleOptions') {  
    $controller = new OptionsController();
    $controller->single();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'modifyOptions') { 
    $controller = new OptionsController();
    $controller->modify();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'deleteOptions') { 
    $controller = new OptionsController();
    $controller->delete();
}

if ((isset($_GET["page"]) && $_GET["page"] == 'signup')) {
    $controller = new UserController();
    $controller->signup();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'login') {  
    $controller = new UserController();
    $controller->login();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'logout') {  
    $controller = new UserController();
    $controller->logout();

}