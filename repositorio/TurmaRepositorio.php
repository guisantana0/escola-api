<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 09/02/2021
 * Time: 23:54
 **/

require_once CLASSE_CORE_CAMINHO.'Repositorio.php';
require_once CLASSE_CORE_CAMINHO.'ConstrutorQueryModelo.php';
require_once MODELO_CAMINHO.'Turma.php';
require_once MODELO_CAMINHO.'TurmaAluno.php';
require_once QUERY_CAMINHO.'TurmaQuery.php';

class TurmaRepositorio extends  \core\Repositorio
{
    public function __construct()
    {
        $umModelo = new Turma();
        parent::__construct($umModelo);
    }

    public function obterTodasTurmas($filtros){
        $resultado = $this->consultarComFiltros($filtros);
        return $resultado;
    }

    public function adicionarNovaTurma($dados){
        $this->adicionar($dados);
    }

    public function atualizarUmaTurma($dados){
        $this->atualizar($dados);
    }

    public function excluirTurma($dados){
        $this->excluirLogicamente($dados);
    }

    public function adicionarAlunoNaTurma($dados){
        $this->modelo = new TurmaAluno();
        $resultado = $this->adicionar($dados);
        return $resultado;
    }

    public function excluirAlunoNaTurma($dados){

        $construtorQuery = new \app\TurmaQuery(new TurmaAluno());
        $query = $construtorQuery->excluirAlunoDaTurmaPorTurmaAluno($dados['turma_id'],$dados['aluno_id']);

        return $this->executarQuery($query);
    }
    public function excluirAlunoNaTurmaPorAlunoTurma($dados){
        $this->modelo = new TurmaAluno();
        $resultado = $this->excluir($dados);
        return $resultado;
    }
}