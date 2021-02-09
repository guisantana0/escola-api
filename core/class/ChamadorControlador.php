<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 15:37
 */

namespace core;

//require_once SYSDIR.'/Controller.php';

class ChamadorControlador
{
    protected $controlador;
    protected $endPoint;
    public function __construct(string $endPoint)
    {
        $this->endPoint = $endPoint;
        $this->trataEndPoint();
        $this->importaControlador();
        $this->instanciaControlador();
        $this->executaMetodo();
    }

    private function trataEndPoint(){
        $parametro = explode("@",$this->endPoint);
        $this->controlador = $parametro[0];
        $this->metodo = $parametro[1];
    }

    private function importaControlador(){
        require_once CONTROLADOR_CAMINHO.$this->controlador.'.php';
    }

    private function instanciaControlador(){
        $this->controlador = new $this->controlador();
    }

    private function executaMetodo(){
        print_r($this->controlador->{$this->metodo}(new Requisicao()));
    }
}