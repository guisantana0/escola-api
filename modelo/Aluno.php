<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 09/02/2021
 * Time: 00:00
 */
require_once CLASSE_CORE_CAMINHO.'Modelo.php';

class Aluno extends \core\Modelo
{
    public function __construct(array $dados = [])
    {
        parent::__construct($dados);
        $this->colunas = ['nome','email','data_nascimento','situacao','data_cadastro','genero'];
        $this->primaria = 'id';
        $this->tabela = 'aluno';
    }
}