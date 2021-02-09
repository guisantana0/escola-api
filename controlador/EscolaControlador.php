<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:22
 */

require_once REPOSITORIO_CAMINHO.'EscolaRepositorio.php';

class EscolaControlador
{

    public function getEscolas(){
      $escolaRepositorio = new EscolaRepositorio();
      echo $escolaRepositorio->obterTodasEscolas();
    }

    public function adicionarNovaEscola($requisicao){
        $escolaRepositorio = new EscolaRepositorio();
        $escolaRepositorio->adicionarNovaEscola($requisicao->post());
    }
}