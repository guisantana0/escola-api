<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:25
 */

namespace core;


abstract class Modelo implements \InterfaceModelo
{
    protected $colunas = [];

    protected $primaria = "";

    protected $dados = [];

    protected $tabela = "";

    public function __construct($novosDados)
    {
       $this->dados = $novosDados;
    }

    protected function atribuiDados($novosDados = []){

        foreach ($novosDados as $coluna => $valor ){
           $this->dados[$coluna] = $valor;
        }

    }

    public function setDados($novosDados){
        $this->atribuiDados($novosDados);
    }

    public function getColunas()
    {
        return $this->colunas;
    }

    public function getTabela()
    {
        return $this->tabela;
    }

    public function getPrimaria(){
        return $this->primaria;
    }

    public function getDados(){
        return array_diff_key(
            $this->dados,
            [
                $this->primaria => $this->dados[$this->primaria]
            ]
        );
    }

    public function getValorPrimaria(){
        return $this->dados[$this->primaria];
    }

}