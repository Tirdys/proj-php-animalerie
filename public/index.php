<?php

define ('ROOT', dirname(__DIR__));

require ROOT . '/Core/App.php';

Core\App::load();

require ROOT . "/App/Routing/Routing.php";
