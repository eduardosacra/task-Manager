<?php
class Conexao
{

    public static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
          try{
            self::$instance = new PDO('mysql:host=localhost;dbname=lista_tarefas',
             'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
          } catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
              die();
          }

        }

        return self::$instance;
    }

}

/**
 * DAO
 * Create, Read, Update and Delete
 */
class DAO_tarefa
{

  private function __construct()
  {}

  public static function listAll()
  {
    $con = Conexao::getInstance();
    $sth = $con->query("SELECT * FROM tarefas");
    $sth->execute();
    return $sth->fetchAll();
  }
}


function buscar_tarefas()
{
  $con = Conexao::getInstance();
  $sth = $con->query("SELECT * FROM tarefas");
  $sth->execute();
  return $sth->fetchAll();
}


 ?>
