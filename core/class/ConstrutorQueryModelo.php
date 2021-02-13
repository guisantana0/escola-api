<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 08/02/2021
 * Time: 01:34
 */

namespace core;
require_once INTERFACE_CORE_CAMINHO.'ConstrutorQueryModelo.php';

class ConstrutorQueryModelo implements \ConstrutorQueryModelo
{

    protected $modelo, $filtros;
    protected $queryDeFiltragem;
    public function ConstrutorQueryModelo(\InterfaceModelo $Modelo){
        $this->modelo = $Modelo;
    }
    public function __construct(\InterfaceModelo $modelo)
    {
        $this->modelo = $modelo;
        $this->queryDeFiltragem = "";
    }

    public function aplicaFiltros($filtros){
        $this->filtros = $filtros;
    }

    public function obterTodos()
    {
        return "SELECT * from {$this->modelo->getTabela()}  ";
    }

    public function obterTodosFiltrado(){
        $sql = "SELECT * from {$this->modelo->getTabela()} ";
        if (!empty($this->queryDeFiltragem)) {
            $sql .= " WHERE  {$this->queryDeFiltragem} ";
        }
        return $sql;
    }

    public function obterPorID($id)
    {
        return "SELECT {$this->modelo->getTabela()}.* from {$this->modelo->getTabela()} where {$this->modelo->getPrimaria()} = {$this->modelo->getValorPrimaria()}";
    }

    public function excluir()
    {
        return "delete from {$this->modelo->getTabela()} where {$this->modelo->getPrimaria()} = {$this->modelo->getValorPrimaria()}";
    }

    public function excluirLogicamente(){
        return "update {$this->modelo->getTabela()} set SITUACAO='EXCLUIDO' WHERE {$this->modelo->getPrimaria()} = {$this->modelo->getValorPrimaria()}";
    }

    public function atualizar(array $dados)
    {
        $this->modelo->setDados($dados);
        $query = "update {$this->modelo->getTabela()} set ";
        $dadosVerificados = $this->verificaNecessidadeAspas($this->modelo->getDados());
        foreach ( $dadosVerificados as $coluna => $dado){
            $querySets []= " {$coluna} = {$dado} ";
        }

        $query .= implode(",",$querySets);

        $query.= " WHERE {$this->modelo->getPrimaria()} = {$this->modelo->getValorPrimaria()}";

        return $query;
    }

    public function adicionar(array $dados){
        $query = "INSERT INTO {$this->modelo->getTabela()} (";

        $query .= implode(",",array_intersect_key (array_keys($this->modelo->getDados()),array_values($this->modelo->getColunas())) );
        $query .= ") VALUES (";
        $query .= implode(",",$this->verificaNecessidadeAspas($this->modelo->getDados()));
        $query .= ")";

        return $query;
    }

    private function verificaNecessidadeAspas($conjuntoDeDados){
        foreach($conjuntoDeDados as $indice => $dado){
            if (!is_int($dado) || !is_float($dado)){
                $conjuntoDeDados[$indice] = "'{$dado}'";
            }
        }
        return $conjuntoDeDados;
    }

   public function where ($coluna,$valor, $condicional = "=" ,  $operadorConjuncao = "AND")
   {
       if (!is_float($valor) || !is_int($valor)) {
           $valor = "'{$valor}'";
       }
       if (empty($this->queryDeFiltragem))
           $this->queryDeFiltragem .= " {$coluna} {$condicional} {$valor} ";
       else{
           $this->queryDeFiltragem .= " {$operadorConjuncao} {$coluna} {$condicional} {$valor} ";
       }

   }


    public function obterPorChaveEstrangeira($chaveEstrangeira, $valor)
    {
        // TODO: Implement obterPorChaveEstrangeira() method.
    }
}