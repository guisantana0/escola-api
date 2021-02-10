<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:26
 */

interface InterfaceModelo
{
    public function getColunas();
    public function getTabela();
    public function getPrimaria();
    public function getValorPrimaria();
    public function getDados();
    public function setDados($dados);

}