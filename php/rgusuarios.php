<?php

/**
 * User: Carlos leon
 * Date: 20/03/2017
 * Time: 07:56 PM
 */

require_once ('conexion.php');
$mysql= new Connection();
$mysql->connect();

if(isset($_POST['nombre'])) {
//insert
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $pw = $_POST['pw'];
    $pw_admin = $_POST['pw_admin'];

    $query = "INSERT INTO login (nombre,usuario,pw,pw_admin) VALUES (?,?,?,?)";
    $mysql->execute($query, array($nombre, $usuario, $pw, $pw_admin));

    if (!$mysql) {
        echo '<script>alert("hubo un error")</script>';
    } else {
        echo '<script>alert("REGISTRO GUARDADO")</script>';
        echo "<script>location.href='administrador.php'</script>";

    }
}