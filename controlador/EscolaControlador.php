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

    public function __construct()
    {
        $this->repositorio = new EscolaRepositorio();
    }

    public function getEscolas($requisicao){
      echo $this->repositorio->obterTodasEscolas($requisicao->get());
    }

    public function adicionarNovaEscola($requisicao){
        echo $this->repositorio->adicionarNovaEscola($requisicao->post());
    }

    public function atualizarEscola($requisicao){
        echo $this->repositorio->atualizarUmaEscola($requisicao->post());
    }

    public function excluirEscola($requisicao){
        echo $this->repositorio->excluirEscola($requisicao->post());
    }
}