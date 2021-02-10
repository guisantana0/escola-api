<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:22
 */

require_once REPOSITORIO_CAMINHO.'TurmaRepositorio.php';

class TurmaControlador
{

    public function __construct()
    {
        $this->repositorio = new TurmaRepositorio();
    }

    public function getTurmas($requisicao){

      echo $this->repositorio->obterTodasTurmas($requisicao->get());
    }

    public function adicionarNovaTurma($requisicao){
        echo $this->repositorio->adicionarNovaTurma($requisicao->post());
    }

    public function atualizarTurma($requisicao){
        echo $this->repositorio->atualizarUmaTurma($requisicao->post());
    }

    public function excluirTurma($requisicao){
        echo $this->repositorio->excluirTurma($requisicao->post());
    }
}