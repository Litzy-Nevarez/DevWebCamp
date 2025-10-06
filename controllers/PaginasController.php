<?php

namespace Controllers;

use Model\Evento;
use Model\Hora;
use Model\Categoria;
use Model\Dia;
use Model\Ponente;
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

        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];

        foreach($eventos as $evento) {

            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        

            if($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            if($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }

        // debuguear($eventos_formateados['conferencias_v']);

        $router->render('pages/conferencias', [
            'titulo' => 'Conferencias & Workshops',
            'eventos' => $eventos_formateados,
        ]);
    }

}