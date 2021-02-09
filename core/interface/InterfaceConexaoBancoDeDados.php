<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 18:11
 */

interface InterfaceConexaoBancoDeDados
{
    public function fecharConexao();
    public function estabelecerConexao();
    public function executarQuery($query);
}