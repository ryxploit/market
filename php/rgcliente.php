<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>

<?php
/**
 * User: Carlos leon
 * Date: 09/03/2017
 * Time: 08:27 PM
 */

require_once ('conexion.php');
$mysql= new Connection();
$mysql->connect();

if(isset($_POST['nombre'])){
    //insert
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $domicilio = $_POST['domicilio'];
    $colonia = $_POST['colonia'];
    $cp = $_POST['cp'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $estado = $_POST['estado'];
    $fecha_registro = $_POST['fecha_registro'];
    $fecha_modificacion = $_POST['fecha_modificacion'];
    $query="INSERT INTO clientes (nombre,apellido_paterno,apellido_materno,telefono,celular,
                                  domicilio,colonia,cp,correo,fecha_nacimiento,estado,
                                  fecha_registro,fecha_modificacion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $mysql->execute($query,array($nombre,$apellido_paterno,$apellido_materno,$telefono,$celular,$domicilio,$colonia,
                                 $cp,$correo,$fecha_nacimiento,$estado,$fecha_registro,$fecha_modificacion));

    if (!$mysql) {
        echo '<script>alert("hubo un error")</script>';
    }
    else {
        echo '<script>alert("REGISTRO GUARDADO")</script>';
        echo "<script>location.href='administrador.php'</script>";


    }
}
?>
</body>
</html>