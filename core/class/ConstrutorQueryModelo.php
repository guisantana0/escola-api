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

    protected $modelo;

    public function ConstrutorQueryModelo(\InterfaceModelo $Modelo){
        $this->modelo = $Modelo;
    }
    public function __construct(\InterfaceModelo $modelo)
    {
        $this->modelo = $modelo;
    }

    public function obterTodos()
    {
        return "SELECT * from {$this->modelo->getTabela()} ";
    }

    public function obterPorID($id)
    {
        return "SELECT {$this->modelo->getTabela()}.* from {$this->modelo->getTabela()} where {$this->modelo->getPrimaria()} = {$id}";
    }

    public function deletar()
    {
        return "delete {$this->modelo->getTabela()}.* from {$this->modelo->getTabela()} where {$this->modelo->getPrimaria()} = {$id}";
    }

    public function atualizar(array $dados)
    {

        $query = "update {$this->modelo->getTabela()} set ";
        foreach ($dados as $coluna => $dado){
            $query.= " {$coluna} = {$dado} ";
        }
        $query.= " WHERE {$this->modelo->getPrimaria()} = {$this->modelo->dados[$this->modelo->getPrimaria()]}";
    }

    public function adicionar(array $dados){
        $query = "INSERT INTO {$this->modelo->getTabela()} (";

        $query .= implode(",",array_intersect_key (array_keys($this->modelo->getDados()),array_values($this->modelo->getColunas())) );
        $query .= ") VALUES (";
        $query .= implode(",",$this->modelo->getDados());
        $query .= ")";

        $this->modelo->setDados($dados);
        var_dump(array_intersect_key (array_keys($this->modelo->getDados()),array_values($this->modelo->getColunas())));
//        var_dump(array_values($this->modelo->getColunas()));
        var_dump(array_intersect_key (array_keys($this->modelo->getDados()),array_values($this->modelo->getColunas())) );
        var_dump($query);
        die;
    }

    public function obterPorChaveEstrangeira($chaveEstrangeira, $valor)
    {
        // TODO: Implement obterPorChaveEstrangeira() method.
    }
}