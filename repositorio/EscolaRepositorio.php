<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 08/02/2021
 * Time: 01:29
 */

require_once CLASSE_CORE_CAMINHO.'Repositorio.php';
require_once CLASSE_CORE_CAMINHO.'ConstrutorQueryModelo.php';
require_once MODELO_CAMINHO.'Escola.php';

class EscolaRepositorio extends \core\Repositorio
{
    public function __construct()
    {
        $umModelo = new Escola();
        parent::__construct($umModelo);
    }

    public function obterTodasEscolas(){
        $construtorDeConsulta = new \core\ConstrutorQueryModelo(new Escola());
        $QueryDeConsulta = $construtorDeConsulta->obterTodos();
        $resultado = $this->executar($QueryDeConsulta);
        var_dump($resultado);
        return json_encode($resultado);
    }

    public function adicionarNovaEscola($dados){
        $escola = new Escola($dados);
        $construtorDeConsulta = new \core\ConstrutorQueryModelo(new Escola());
        $construtorDeConsulta->adicionar($dados);
    }
}