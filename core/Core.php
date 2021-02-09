<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:16
 */
namespace core;
use core\Route as Route;
include CLASSE_CORE_CAMINHO . 'Requisicao.php';
class Core
{


    public function __construct()
    {
        $this->incluiRotas();
    }

    private function incluiRotas (){
        include CLASSE_CORE_CAMINHO . 'Route.php';
        include ROTAS_CAMINHO.'api.php';
    }

    public function tratarRequisicao(){
        $requisicao = new Requisicao();
        Route::chamaPontoAcesso($requisicao->getUrl());
    }
}