<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:03
 */

\core\Route::get('/escolas','EscolaControlador@getEscolas');
\core\Route::post('/escola/store','EscolaControlador@adicionarNovaEscola');
\core\Route::get('/turmas','TurmasControlador@getTurmas');
\core\Route::get('/alunos','AlunosControlador@getAlunos');
