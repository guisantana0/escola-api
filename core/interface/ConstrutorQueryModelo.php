<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 08/02/2021
 * Time: 01:35
 */

interface ConstrutorQueryModelo
{
    public function ConstrutorQueryModelo(InterfaceModelo $Modelo);
    public function obterPorID($ID);
    public function excluir();
    public function atualizar(array $dados);
    public function obterPorChaveEstrangeira($chaveEstrangeira, $valor);
}