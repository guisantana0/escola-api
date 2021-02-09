<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 08/02/2021
 * Time: 01:58
 */
require_once CLASSE_CORE_CAMINHO.'Modelo.php';

class Escola extends \core\Modelo
{
    public function __construct(array $dados = [])
    {
        parent::__construct($dados);
        $this->colunas = ['nome','endereco','situacao','data_cadastro'];
        $this->primaria = 'id';
        $this->tabela = 'escola';
    }
}