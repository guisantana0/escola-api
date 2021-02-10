<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 09/02/2021
 * Time: 00:00
 */
require_once CLASSE_CORE_CAMINHO.'Modelo.php';

class Turma extends \core\Modelo
{
    public function __construct(array $dados = [])
    {
        parent::__construct($dados);
        $this->colunas = ['serie','ano','nivel_ensino','turno','escola_id'];
        $this->primaria = 'id';
        $this->tabela = 'turma';
    }
}