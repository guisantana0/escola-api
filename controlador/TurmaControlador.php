<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:22
 */

require_once REPOSITORIO_CAMINHO.'TurmaRepositorio.php';
require_once CLASSE_CORE_CAMINHO.'MensagemSistema.php';

class TurmaControlador
{

    public function __construct()
    {
        $this->repositorio = new TurmaRepositorio();
    }

    public function getTurmas($requisicao){

      echo json_encode($this->repositorio->obterTodasTurmas($requisicao->get()));
    }

    public function adicionarAlunoNaTurma($requisicao){
        $adicionado =  json_encode($this->repositorio->adicionarAlunoNaTurma($requisicao->post()));
        if ($adicionado){
            \core\MensagemSistema::REGISTRO_ADICIONADO_SUCESSO();
        }
        else{
            \core\MensagemSistema::ERRO_ADICIONAR_REGISTRO();
        }
    }

    public function excluirAlunoNaTurma($requisicao){
        $excluido =  json_encode($this->repositorio->adicionarAlunoNaTurma($requisicao->post()));

        if ($excluido){
            \core\MensagemSistema::REGISTRO_EXCLUIDO_SUCESSO();
        }else{
            \core\MensagemSistema::ERRO_EXCLUIR_REGISTRO();
        }
    }

    public function adicionarNovaTurma($requisicao){
        $adicionado =  $this->repositorio->adicionarNovaTurma($requisicao->post());

        if ($adicionado){
            \core\MensagemSistema::REGISTRO_ADICIONADO_SUCESSO();
        }
        else{
            \core\MensagemSistema::ERRO_ADICIONAR_REGISTRO();
        }
    }

    public function atualizarTurma($requisicao){
        $atualizado = $this->repositorio->atualizarUmaTurma($requisicao->post());
        if ($atualizado){
            \core\MensagemSistema::REGISTRO_ATUALIZADO_SUCESSO();
        }
        else{
            \core\MensagemSistema::ERRO_ADICIONAR_REGISTRO();
        }
    }

    public function excluirTurma($requisicao){
        $excluido =  $this->repositorio->excluirTurma($requisicao->post());

        if ($excluido){
            \core\MensagemSistema::REGISTRO_EXCLUIDO_SUCESSO();
        }else{
            \core\MensagemSistema::ERRO_EXCLUIR_REGISTRO();
        }
    }

}