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

class EscolaRepositorio extends  \core\Repositorio
{
    public function __construct()
    {
        $umModelo = new Escola();
        parent::__construct($umModelo);
    }

    public function obterTodasEscolas($filtros){
        $resultado = $this->consultarComFiltros($filtros);
        return $resultado;
    }

    public function adicionarNovaEscola($dados){
        $this->adicionar($dados);
    }

    public function atualizarUmaEscola($dados){
        $this->atualizar($dados);
    }

    public function excluirEscola($dados){
        $this->excluirLogicamente($dados);
    }
}