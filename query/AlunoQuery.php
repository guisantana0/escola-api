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
}