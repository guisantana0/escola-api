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

    public function getAlunos($requisicao){
      echo json_encode($this->repositorio->obterTodasAlunos($requisicao->get()));
    }

    public function getAlunosPorNome($requisicao){
        echo json_encode($this->repositorio->obterAlunosPorNome($requisicao->get()));
    }

    public function getAlunosDaTurma($requisicao){
        return json_encode($this->repositorio->obterTodasAlunosDaTurma($requisicao->get()));
    }

    public function getAlunosQueNaoEstaoNaTurma($requisicao){
        $filtros = $requisicao->get();
        $alunosQueNaoEstaoNaTurma = $this->repositorio->obterAlunosQueNaoEstaoNaTurma($filtros);
        return json_encode($alunosQueNaoEstaoNaTurma);
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