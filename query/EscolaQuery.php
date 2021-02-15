<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 11/02/2021
 * Time: 18:15
 */
namespace app;
use core\ConstrutorQueryModelo;
class EscolaQuery extends ConstrutorQueryModelo
{
    public function obterTotalDeAlunosDaEscola($escola_id){
        return "select count(*) as quantidade from aluno a2 
                    inner join turma_aluno ta on (
                        ta.aluno_id = a2.id
                    )
                    inner join turma t on (
                        t.id = ta.turma_id 
                    )
                    inner join escola e on (
                        e.id = t.escola_id 
                    )
                    where e.id = {$escola_id}";
    }

    public function obterEscolasComTotalDeAlunos(){
        return "
          SELECT e2.*, 
          (
              select count(*) as quantidade from aluno a2 
              inner join turma_aluno ta on (
                    ta.aluno_id = a2.id
              )
              inner join turma t on (
                    t.id = ta.turma_id 
              )
              inner join escola e on (
                    e.id = t.escola_id 
              )
              where e.id = e2.id
        )as total_alunos
        from escola e2 
        where
        e2.situacao='ATIVO'
        ";
    }

}