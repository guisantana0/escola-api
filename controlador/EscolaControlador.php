<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:22
 */

require_once REPOSITORIO_CAMINHO.'EscolaRepositorio.php';
require_once CLASSE_CORE_CAMINHO.'MensagemSistema.php';


class EscolaControlador
{

    public function __construct()
    {
        $this->repositorio = new EscolaRepositorio();
    }

    public function getEscolas($requisicao){
        echo json_encode($this->repositorio->obterTodasEscolasAtivas($requisicao->get()));
    }

    public function adicionarNovaEscola($requisicao){
        $adicionado = $this->repositorio->adicionarNovaEscola($requisicao->post());
        if ($adicionado){
           \core\MensagemSistema::REGISTRO_ADICIONADO_SUCESSO();
        }
        else{
            \core\MensagemSistema::ERRO_ADICIONAR_REGISTRO();
        }
    }

    public function atualizarEscola($requisicao){

        $atualizado = $this->repositorio->atualizarUmaEscola($requisicao->post());
        if ($atualizado){
            \core\MensagemSistema::REGISTRO_ATUALIZADO_SUCESSO();
        }
        else{
            \core\MensagemSistema::ERRO_ADICIONAR_REGISTRO();
        }
    }

    public function excluirEscola($requisicao){
        $excluido  = $this->repositorio->excluirEscola($requisicao->post());

        if ($excluido){
            \core\MensagemSistema::REGISTRO_EXCLUIDO_SUCESSO();
        }else{
            \core\MensagemSistema::ERRO_EXCLUIR_REGISTRO();
        }
    }
}