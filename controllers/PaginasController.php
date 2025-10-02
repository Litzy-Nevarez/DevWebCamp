<?php

namespace Controllers;

use MVC\Router;

class PaginasController {
    public static function index(Router $router) {

        $router->render('pages/index', [
            'titulo' => 'Inicio',
        ]);
    }

    public static function evento(Router $router) {

        $router->render('pages/devwepcamp', [
            'titulo' => 'Sobre DevWebCamp',
        ]);
    }

    public static function paquetes(Router $router) {

        $router->render('pages/paquetes', [
            'titulo' => 'Paquetes DevWebCamp',
        ]);
    }

    public static function conferencias(Router $router) {

        $router->render('pages/conferencias', [
            'titulo' => 'Conferencias & Workshops',
        ]);
    }

}