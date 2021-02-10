<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 07/02/2021
 * Time: 16:34
 */

namespace core;
require_once INTERFACE_CORE_CAMINHO.'InterfaceConexaoBancoDeDados.php';
require_once CLASSE_CORE_CAMINHO.'ConfiguracaoBanco.php';
class ConexaoBancoDeDados implements \InterfaceConexaoBancoDeDados
{
    protected $conexao = null;

    protected static $instancia;

    protected $statement;

    public function __construct()
    {
        $this->atribuirDadosConexao();
    }

    public function getInstance(){
        if (ConexaoBancoDeDados::$instancia == null){
            ConexaoBancoDeDados::$instancia = new ConexaoBancoDeDados();
        }
        return ConexaoBancoDeDados::$instancia ;
    }

    private function atribuirDadosConexao(){
        $this->dadosConexao = [];
        $this->dadosConexao['DSN'] = ConfiguracaoBanco::getDSN();
        $this->dadosConexao['HOST'] = ConfiguracaoBanco::$endereco_ip;
        $this->dadosConexao['USER'] = ConfiguracaoBanco::$usuario;
        $this->dadosConexao['PASS'] = ConfiguracaoBanco::$senha;
    }

    private function iniciarConexao() {
        try {
            if ($this->conexao == null) {
                $opcoes = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
                $this->conexao = new \PDO( $this->dadosConexao['DSN'], $this->dadosConexao['USER'], $this->dadosConexao['PASS'],$opcoes);

                if (!$this->conexao)
                    $this->throwBusinessException($this->conexao, MensagensAplicacao::BANCO_ERRO_CONEXAO);

                //força o nome das coluns serem retornadas como maiúsculas
                $this->conexao->setAttribute(\PDO::ATTR_CASE, \PDO::CASE_UPPER);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }


    public function fecharConexao()
    {
        // TODO: Implement fecharConexao() method.
        $this->conexao = null;
    }

    public function estabelecerConexao()
    {
        if ($this->conexao == null){
            iniciarConexao();
        }

        return $this->conexao;
    }

    public function executarQuery($query)
    {
        $this->iniciarConexao();

        $query = $this->preparaQuery($query);
        $query->execute();
        $this->statement = $query;

        return $this;
    }

    private function preparaQuery($query){
        return $this->conexao->prepare($query);
    }

    public function obterResultado(){
        return $this->statement->fetchAll();
    }
}