<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:22
 */

require_once REPOSITORIO_CAMINHO.'AlunoRepositorio.php';
require_once CLASSE_CORE_CAMINHO.'MensagemSistema.php';

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
        $adicionado =  $this->repositorio->adicionarNovaAluno($requisicao->post());
        if ($adicionado){
            \core\MensagemSistema::REGISTRO_ADICIONADO_SUCESSO();
        }
        else{
            \core\MensagemSistema::ERRO_ADICIONAR_REGISTRO();
        }
    }

    public function atualizarAluno($requisicao){
        $atualizado =  $this->repositorio->atualizarUmAluno($requisicao->post());
        if ($atualizado){
            \core\MensagemSistema::REGISTRO_ATUALIZADO_SUCESSO();
        }
        else{
            \core\MensagemSistema::ERRO_ADICIONAR_REGISTRO();
        }
    }

    public function excluirAluno($requisicao){
        $excluido = $this->repositorio->excluirAluno($requisicao->post());
        if ($excluido){
            \core\MensagemSistema::REGISTRO_EXCLUIDO_SUCESSO();
        }else{
            \core\MensagemSistema::ERRO_EXCLUIR_REGISTRO();
        }
    }
}