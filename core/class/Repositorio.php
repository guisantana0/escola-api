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
        $this->efetuaConexaoComBancoDeDados();
    }

    public function consultarSemFiltros()
    {
        $novoModelo = new $this->modelo();
        $construtorDeQuery = new ConstrutorQueryModelo($novoModelo);
        $query = $construtorDeQuery->obterTodos();
        return  $this->executarQuery($query)->obterResultado();
    }

    public function consultarComFiltros($filtros = [])
    {
        $novoModelo = new $this->modelo();
        $construtorDeQuery = new ConstrutorQueryModelo($novoModelo);
        foreach($filtros as $coluna => $valor){
            $construtorDeQuery->where($coluna,$valor);
        }
        $query = $construtorDeQuery->obterTodosFiltrado();
        return  $this->executarQuery($query)->obterResultado();
    }

    public function consultarComQuery($query)
    {
        $this->executarQuery($query)->obterResultado();
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

    protected function adicionar(array $dados){
        $novoModelo = new $this->modelo($dados);
        $construtorDeQuery = new ConstrutorQueryModelo($novoModelo);
        $query = $construtorDeQuery->adicionar($dados);

        return $this->executarQuery($query);
    }

    protected function atualizar( array $dados){
        $novoModelo = new $this->modelo($dados);
        $construtorDeQuery = new ConstrutorQueryModelo($novoModelo);

        $query = $construtorDeQuery->atualizar($dados);

        return $this->executarQuery($query);
    }

    protected function excluir(array $dados){
        $novoModelo = new $this->modelo($dados);
        $construtorDeQuery = new ConstrutorQueryModelo($novoModelo);
        $query = $construtorDeQuery->excluir($dados);
        return $this->executarQuery($query);
    }

    protected function excluirLogicamente(array $dados){
        $novoModelo = new $this->modelo($dados);
        $construtorDeQuery = new ConstrutorQueryModelo($novoModelo);

        $query = $construtorDeQuery->excluirLogicamente($dados);
        return $this->executarQuery($query);
    }
}