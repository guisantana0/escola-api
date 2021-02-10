<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:22
 */

require_once REPOSITORIO_CAMINHO.'AlunoRepositorio.php';

class AlunoControlador
{

    public function __construct()
    {
        $this->repositorio = new AlunoRepositorio();
    }

    public function getAlunos(){
      echo $this->repositorio->obterTodasAlunos();
    }

    public function adicionarNovoAluno($requisicao){
        echo $this->repositorio->adicionarNovaAluno($requisicao->post());
    }

    public function atualizarAluno($requisicao){
        echo $this->repositorio->atualizarUmAluno($requisicao->post());
    }

    public function excluirAluno($requisicao){
        echo $this->repositorio->excluirAluno($requisicao->post());
    }
}