<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 09/02/2021
 * Time: 23:54
 */

require_once CLASSE_CORE_CAMINHO.'Repositorio.php';
require_once CLASSE_CORE_CAMINHO.'ConstrutorQueryModelo.php';
require_once MODELO_CAMINHO.'Aluno.php';
require_once QUERY_CAMINHO.'AlunoQuery.php';

class AlunoRepositorio extends  \core\Repositorio
{
    public function __construct()
    {
        $umModelo = new app\Aluno();
        parent::__construct($umModelo);
    }

    public function obterTodasAlunos(){

        $resultado = $this->consultar([]);
        return $resultado;
    }

    public function adicionarNovaAluno($dados){
        $this->adicionar($dados);
    }

    public function atualizarUmAluno($dados){
        $this->atualizar($dados);
    }

    public function excluirAluno($dados){
        $this->excluirLogicamente($dados);
    }

    public function obterTodasAlunosDaTurma($dados){
        if (isset($dados['turma_id'])){
            $turma_id = $dados['turma_id'];
        }
        $construtorQuery = new \app\AlunoQuery($this->modelo);
        $query = $construtorQuery->obterTodosAlunosDaTurmaPorID($turma_id);
        return $this->consultarComQuery($query);
    }
}