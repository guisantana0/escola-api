# escola-api
Backend do sistema de gestão escolar

#requisitos
PHP 7.0+
Mysql 5.7+
Apache Server 2.4.* +


#URLS
todas as urls retornam um arranjo de objetos JSON

Após clonar o repositório no diretório c:/wamp/www execute os seguintes passos:


* Crie um schema no banco de dados chamado 'escola'
* Execute os scripts do banco de dados que estão na pasta Scripts/ddl.sql
* Configure as credenciais de conexão do banco no arquivo: /core/class/ConfiguracaoBanco.php
* as linhas 15 até 19 do arquivo "ConfiguracaoBanco.php" são informações necessárias para efetuar conexão com o banco de dados
  * Endereço ip, porta, usuário do banco, senha de acesso ao banco
  
  Importante frisar que talvez seja necessário alterar o arquivo de configuração do servidor Apache para conexão e/ou acesso em outro computador
  na pasta de configuração do apache: wamp/bin/apache/apache{versão do apache}/conf/extra/httpd-vhosts.conf
  adicionar a linha: 
  * "Require all granted" (Dentro da tag Directory)
  
  
