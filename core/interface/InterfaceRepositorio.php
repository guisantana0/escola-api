<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:29
 */

interface InterfaceRepositorio
{
    public function executar(string $query);
    public function primeiro();
    public function quantidadeRegistros();
}