<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 08/02/2021
 * Time: 01:29
 */

require_once CLASSE_CORE_CAMINHO.'Repositorio.php';
require_once CLASSE_CORE_CAMINHO.'ConstrutorQueryModelo.php';
require_once MODELO_CAMINHO.'Escola.php';
require_once QUERY_CAMINHO.'EscolaQuery.php';

class EscolaRepositorio extends  \core\Repositorio
{
    public function __construct()
    {
        $umModelo = new Escola();
        parent::__construct($umModelo);
    }

    public function obterTodasEscolas($filtros){
        $resultado = $this->consultarComFiltros($filtros);
        return $resultado;
    }

    public function obterTodasEscolasAtivas($filtros){
        $filtroAtivo = ['situacao'=>'ATIVO'];
        $filtros = array_merge($filtros,$filtroAtivo);
        $resultado = $this->consultarComFiltros($filtros);
        return $resultado;
    }

    public function obterEscolasComTotalDeAlunos($filtros){
        $construtorQuery = new \app\EscolaQuery($this->modelo);
        $query = $construtorQuery->obterEscolasComTotalDeAlunos();
        $resultado = $this->consultarComQuery($query);
        return $resultado;
    }

    public function adicionarNovaEscola($dados){
        try{
            $this->adicionar($dados);
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    public function atualizarUmaEscola($dados){
        try{
            $this->atualizar($dados);
            return true;
        }catch (Exception $e){
            return false;
        }

    }

    public function excluirEscola($dados){
        try{
            $this->excluirLogicamente($dados);
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    public function obterTotalDeAlunos($dados){
        if (isset($dados['id'])){
            $construtorQuery = new \app\EscolaQuery(new Escola());
            $escola_id = $dados['id'];
            $query = $construtorQuery->obterTotalDeAlunosDaEscola($escola_id);
            $resultado = $this->consultarComQuery($query);
            return $resultado;
        }else{

            return \core\MensagemSistema::ARRAY_MENSAGEM_ERRO_FILTROS_PESQUISA();;
        }

    }
}