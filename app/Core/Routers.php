<?php

namespace App\Core;

use CoffeeCode\Router\Router;
use Exception;

class Routers {

    public function init() {

        $router = new Router(URL_BASE);
        $router->namespace("App\Core\Controller");

        try {
        
            // Auth

            $router->get("/", "Pages\Home:render");

            $router->dispatch();

        } catch(Exception $e) {

            exit("Erro: {$router->error()}");

        }

        if($router->error()) {

            exit("Erro: {$router->error()}");

        }

    }

}