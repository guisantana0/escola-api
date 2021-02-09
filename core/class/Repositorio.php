<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:29
 */

namespace core;
require_once INTERFACE_CORE_CAMINHO.'InterfaceRepositorio.php';
require_once INTERFACE_CORE_CAMINHO.'InterfaceModelo.php';
require_once CLASSE_CORE_CAMINHO.'ConexaoBancoDeDados.php';

abstract class Repositorio implements \InterfaceRepositorio
{
    protected $registros = [];
    protected $modelo;

    public function __construct(\InterfaceModelo $umModelo)
    {
        $this->modelo = $umModelo;
    }

    public function executar(string $query)
    {
        // TODO: Implement consultar() method.
        $this->efetuaConexaoComBancoDeDados();
        return  $this->executarQuery($query);
    }

    private function efetuaConexaoComBancoDeDados(){
        $this->conexao = new ConexaoBancoDeDados();
    }
    private function executarQuery($query){
        return $this->conexao->executarQuery($query);
    }


    public function primeiro()
    {
        if (isset($this->registros[0])){
            return $this->registros[0];
        }
        else{
            return [];
        }
    }

    public function quantidadeRegistros()
    {
        return count($this->registros);
    }

    public function adicionar($dados){
        $novoModelo = new $this->modelo($dados);
        $construtorDeQuery = new ConstrutorQueryModelo($novoModelo);
        $novoModelo->adicionar();
    }
}