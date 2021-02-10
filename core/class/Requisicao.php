<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:52
 */

namespace core;
require_once INTERFACE_CORE_CAMINHO . 'InterfaceRequisicao.php';


class Requisicao implements InterfaceRequisicao
{

    protected $url;

    public function __construct()
    {
        if (isset($_SERVER['PATH_INFO'])){
            $this->url  = $_SERVER['PATH_INFO'];
        }else{
            $this->url = '/';
        }

    }

    public function get()
    {
        return $_GET;
    }

    public function post()
    {
        return $_POST;
    }

    public function put(){
        return $_POST;
    }

    public function getUrl(){
        return $this->url;
    }

}