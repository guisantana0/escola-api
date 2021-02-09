<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 15:21
 */

namespace core;

use core\ChamadorControlador;
class Route
{

    protected static $GET, $POST;

    protected static $instancia;

    public static function getInstancia(){
        if (Route::$instancia == null){
            Route::$instancia = new Route();
            return Route::$instancia;
        }
        else{
            return Route::$instancia;
        }
    }

    public static function get($novaURL, $pontoAcesso){
        Route::$GET[$novaURL] = $pontoAcesso;
    }

    public static function post($newURL, $pontoAcesso){
        Route::$POST[$newURL] = $pontoAcesso;
    }
    
    public static function chamaPontoAcesso($url){
        require_once CLASSE_CORE_CAMINHO . 'ChamadorControlador.php';
        if (isset(Route::$GET[$url])){
            return new ChamadorControlador(Route::$GET[$url]);
        }else
        if (isset(Route::$POST[$url])){
            return new ChamadorControlador(Route::$POST[$url]);
        };

    }
}