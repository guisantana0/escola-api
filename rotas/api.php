<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:03
 */

\core\Route::get('/escolas','EscolaControlador@getEscolas');
\core\Route::get('/escolas/','EscolaControlador@getEscolas');
\core\Route::post('/escola/adicionar','EscolaControlador@adicionarNovaEscola');
\core\Route::post('/escola/adicionar/','EscolaControlador@adicionarNovaEscola');
\core\Route::post('/escola/atualizar','EscolaControlador@atualizarEscola');
\core\Route::post('/escola/atualizar/','EscolaControlador@atualizarEscola');
\core\Route::post('/escola/excluir','EscolaControlador@excluirEscola');
\core\Route::post('/escola/excluir/','EscolaControlador@excluirEscola');

\core\Route::get('/turmas','TurmaControlador@getTurmas');
\core\Route::get('/turmas/','TurmaControlador@getTurmas');
\core\Route::post('/turma/adicionar','TurmaControlador@adicionarNovaTurma');
\core\Route::post('/turma/adicionar/','TurmaControlador@adicionarNovaTurma');
\core\Route::post('/turma/atualizar','TurmaControlador@atualizarTurma');
\core\Route::post('/turma/atualizar/','TurmaControlador@atualizarTurma');
\core\Route::post('/turma/excluir','TurmaControlador@excluirTurma');
\core\Route::post('/turma/excluir/','TurmaControlador@excluirTurma');

\core\Route::get('/alunos','AlunoControlador@getAlunos');
\core\Route::get('/alunos/','AlunoControlador@getAlunos');
\core\Route::get('/alunos/nome/','AlunoControlador@getAlunosPorNome');
\core\Route::get('/alunos/nome/turma/novos/','AlunoControlador@getAlunosQueNaoEstaoNaTurma');
\core\Route::get('/alunos/turma/','AlunoControlador@getAlunosDaTurma');
\core\Route::post('/aluno/adicionar','AlunoControlador@adicionarNovoAluno');
\core\Route::post('/aluno/adicionar/','AlunoControlador@adicionarNovoAluno');
\core\Route::post('/aluno/atualizar','AlunoControlador@atualizarAluno');
\core\Route::post('/aluno/atualizar/','AlunoControlador@atualizarAluno');
\core\Route::post('/aluno/excluir','AlunoControlador@excluirAluno');
\core\Route::post('/aluno/excluir/','AlunoControlador@excluirAluno');

