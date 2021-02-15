<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 11/02/2021
 * Time: 18:15
 */
namespace app;
use core\ConstrutorQueryModelo;
class TurmaQuery extends ConstrutorQueryModelo
{
    public function obterTodosAlunosDaTurmaPorID($turma_id){
        return "SELECT alunos from alunos inner join turma_aluno ta on (ta.aluno_id = alunos.id) where ta.turma_id = {$turma_id}";
    }

    public function excluirAlunoDaTurmaPorTurmaAluno($turma_id,$aluno_id){
        return "DELETE FROM turma_aluno where turma_id = {$turma_id} and aluno_id = {$aluno_id}";
    }
}