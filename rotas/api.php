<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:03
 */

\core\Route::get('/escolas','EscolaControlador@getEscolas');
\core\Route::post('/escola/adicionar','EscolaControlador@adicionarNovaEscola');
\core\Route::post('/escola/atualizar','EscolaControlador@atualizarEscola');
\core\Route::post('/escola/excluir','EscolaControlador@excluirEscola');

\core\Route::get('/turmas','TurmasControlador@getTurmas');
\core\Route::get('/alunos','AlunosControlador@getAlunos');
\core\Route::get('/alunos','AlunosControlador@getAlunos');
