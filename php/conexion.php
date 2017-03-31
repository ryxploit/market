<?php
/**
 * User: Carlos leon
 * Date: 09/03/2017
 * Time: 08:06 PM
 */

class Connection{

    var $server="localhost";
    var $username="root";
    var $password="";
    var $database="market";
    var $db_selected;
    var $connection;
    var $result;

    function __construct() {}

    function connect()
    {
        try{

            // Abre la caonexion a la base de datos
            $this->connection = new PDO("mysql:host=".$this->server.";dbname=".$this->database.";charset=utf8;", $this->username, $this->password);

        }catch (PDOException $e) {
            die("<p>Error: " . $e->getMessage() . "</p>\n");
        }

        $this->connection->exec("SET NAMES 'utf8'");
    }

    function exec($query){
        return $this->connection->exec($query);
    }

    function query($query){
        return $this->connection->query($query);
    }


    function execute($query,$parameters=NULL)
    {

        try{
            $this->index=-1;
            if($parameters!=NULL){
                $preparedQuery=$this->connection->prepare($query);
                $preparedQuery->execute($parameters);
                try{
                    $this->result = $preparedQuery->fetchAll();
                }catch(PDOException $ex){}
            }else{
                //$preparedQuery=$this->connection->prepare($query);
                $this->result = $this->connection->query($query)->fetchAll();

            }
        }catch(PDOException $ex){
            //
            if($this->desarrollo)
                echo $ex->getMessage();
        }

        return $this->result;
    }




}

