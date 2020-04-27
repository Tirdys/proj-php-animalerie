<?php

namespace Core\Controller;

class Controller{
    public function render($view, $params = [])
    {
        ob_start();
        extract($params);
        require ROOT . '/App/View/' . $view . '.php';
        $content = ob_get_clean();
        require ROOT . '/App/View/default.php';
    }

    public function redirectToRoute($route, $id = null)
    {
        if (is_null($id)) {
            return header("Location: index.php?page=" . $route);
        } else {
            return header("Location: index.php?page=" . $route . "&id=" . $id);
        }
    }
}