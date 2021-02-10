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

    protected static $GET, $POST, $PUT, $DELETE;

    protected static $instancia;

    protected $metodoRequisicao;

    public function __construct()
    {
        $this->metodoRequisicao = [
            'POST' => Route::$POST,
            'GET'  => Route::$GET,
            'PUT'  => Route::$PUT,
            'DELETE'  => Route::$DELETE
        ];
    }

    /**
     * @return array
     */
    public function getMetodoRequisicao(): array
    {
        return $this->metodoRequisicao;
    }

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
    public static function put($novaURL, $pontoAcesso){
        Route::$PUT[$novaURL] = $pontoAcesso;
    }

    public static function delete($newURL, $pontoAcesso){
        Route::$DELETE[$newURL] = $pontoAcesso;
    }

    public static function chamaPontoAcesso($url){
        require_once CLASSE_CORE_CAMINHO . 'ChamadorControlador.php';
        $METODO = $_SERVER['REQUEST_METHOD'];
        $instanciaRoute = Route::getInstancia();
        if (isset( $instanciaRoute->getMetodoRequisicao()[$METODO][$url])){
            $pontoDeAcesso = $instanciaRoute->getMetodoRequisicao()[$METODO][$url];
            return new ChamadorControlador($pontoDeAcesso);
        }else{
           echo json_encode(['sucesso'=>false, 'mensagem'=>'Rota inexistente']);
        }
    }


}