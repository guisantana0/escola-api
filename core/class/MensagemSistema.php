<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 14/02/2021
 * Time: 16:17
 */

namespace core;


class MensagemSistema
{
    public static function REGISTRO_ADICIONADO_SUCESSO(){
        echo json_encode( [
            'sucesso'=> true,
            'mensagem'=> 'REGISTRO ADICIONADO COM SUCESSO'
        ] );
    }
    public static function REGISTRO_ATUALIZADO_SUCESSO(){
        echo json_encode( [
            'sucesso'=> true,
            'mensagem'=> 'REGISTRO ATUALIZADO COM SUCESSO'
        ] );
    }
    public static function REGISTRO_EXCLUIDO_SUCESSO(){
        echo json_encode( [
            'sucesso'=> true,
            'mensagem'=> 'REGISTRO EXCLUIDO COM SUCESSO'
        ] );
    }


    public static function ERRO_ADICIONAR_REGISTRO(){
        echo json_encode( [
            'sucesso'=> true,
            'mensagem'=> 'ERRO AO ADICIONAR O REGISTRO'
        ] );
    }
    public static function ERRO_ATUALIZAR_REGISTRO(){
        echo json_encode( [
            'sucesso'=> true,
            'mensagem'=> 'ERRO AO ATUALIZAR O REGISTRO'
        ] );
    }
    public static function ERRO_EXCLUIR_REGISTRO(){
        echo json_encode( [
            'sucesso'=> true,
            'mensagem'=> 'ERRO AO EXCLUIR O REGISTRO'
        ] );
    }
}