<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 18:17
 */

namespace core;
require_once INTERFACE_CORE_CAMINHO.'InterfaceConfiguracaoBanco.php';

class ConfiguracaoBanco implements InterfaceConfiguracaoBanco
{

    public static $endereco_ip = "127.0.0.1";
    public static $porta = "3306";
    public static $senha = "";
    public static $usuario = "root";
    public static $nomeDoBanco = "escola";

    private static function getMysqlDSN(){
        return 'mysql:dbname='.ConfiguracaoBanco::$nomeDoBanco.';'.'host='.ConfiguracaoBanco::$endereco_ip;
    }

    public static function getDSN()
    {
        return ConfiguracaoBanco::getMysqlDSN();
    }
}