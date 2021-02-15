<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 11/02/2021
 * Time: 18:15
 */
namespace app;
use core\ConstrutorQueryModelo;
class AlunoQuery extends ConstrutorQueryModelo
{
    public function obterTodosAlunosDaTurmaPorID($turma_id){
        return "SELECT aluno.* from aluno inner join turma_aluno ta on (ta.aluno_id = aluno .id) where ta.turma_id = {$turma_id}";
    }

    public function obterAlunosPorNome($nome){
        return "SELECT aluno.* from aluno  where aluno.nome like '%{$nome}%' ";
    }

    public function obterAlunosAtivosPorNome($nome){
        return "SELECT aluno.* from aluno  where aluno.situacao='ATIVO' and aluno.nome like '%{$nome}%' ";
    }

    public function obterAlunosPorNomeQueNaoEstaoNaTurma($nome,$turma_id){
        $sql = "SELECT a.* from aluno a where a.id not in (select ta.aluno_id from turma_aluno ta where ta.turma_id = {$turma_id} ) ";

        if (!empty($nome)){
            $sql.=" and a.nome like '%{$nome}%'";
        }
        return $sql;
    }
}