# CRUD Simples Utilizando PHP + MySql + Bootstrap 4
Cadastro Simples para agendamento de consultas, incluir, excluir e editar em um crud personalizado.
Foi optado nesse modelo para desenvolcimento mais rápido de aplição simples. 
Não foi implementado: pequisa, paginação e relatório por ser algo mais complexo e pode levar mais tempo.

=== Projeto rodou com Laragon
=== Apache 2.4
=== PHP 8
=== MySql 8 


Instalação
------------

Criar o banco e as tabelas no MySql: 
Estão no script "sql_bd.sql" na raiz do projeto.

O arquivo Conexao.php dentro da pasta 'app/conexao' já está configurado para rodar localmente com MySql.<br>

Aterar parâmetros caso necessário (dbname,user,password) na conexão de acordo com o banco. <br>

-Conexão para MySql usando PDO
```php
 if (!isset(self::$instance)) {
           self::$instance = new PDO('mysql:host=localhost;dbname=agendamento', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
           self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
       }

       return self::$instance;
```
-Conexão para PostgreSql usando PDO

```php
        $host = 'localhost;port=5432';
        $dbname = 'github';
        $user = 'root';
        $pass = '';
        try {
      
            if (!isset(self::$instance)) {
                self::$instance = new \PDO('pgsql:host='.$host.';dbname=' . $dbname . ';options=\'--client_encoding=UTF8\'', $user, $pass);
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(\PDO::ATTR_ORACLE_NULLS, \PDO::NULL_EMPTY_STRING);
            }

            return self::$instance;
        } catch (Exception $ex) {
            echo $ex.'<br>';
        }
```


