<?php
/**
 * Created by PhpStorm.
 * User: Carlos leon
 * Date: 20/03/2017
 * Time: 09:22 PM
 */

extract($_GET);
require_once ('conexion.php');
$mysql= new Connection();
$mysql->connect();

$sql="SELECT * FROM login WHERE id_usuarios=$id";

$ressql=$mysql->execute($sql);

while ($row=$ressql){
    $id=$row[0];
    $nombre=$row[1];
    $usuario=$row[2];
    $pw=$row[3];
    $pw_admin=$row[4];

}

