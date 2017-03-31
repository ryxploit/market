<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">






</head>
<body>

<?php
/**
 * User: Carlos leon
 * Date: 09/03/2017
 * Time: 08:27 PM
 */


session_start();
require_once ('conexion.php');
$mysql= new Connection();
$mysql->connect();
$username=$_POST['usuario'];
$pass=$_POST['contra'];



//condicion de logeo de admin
    $sql = "SELECT * FROM login WHERE usuario = ? ";
    $adm = $mysql->execute($sql, array($username));
    if (count($adm) > 0) {
        $f2 = $adm[0];
        if ($pass == $f2['pw_admin']) {
            $_SESSION['proteccion'] = true;
            $_SESSION['id_usuarios'] = $f2['id_usuarios'];
            $_SESSION['usuario'] = $f2['usuario'];
            $_SESSION['nombre'] = $f2['nombre'];
            echo "<script>location.href='administrador.php'</script>";

        }
    }

//condicion de logeo de admin
$sql = "SELECT * FROM login WHERE usuario = ? ";
$em = $mysql->execute($sql, array($username));
if (count($em) > 0) {
    $f3 = $em[0];
    if ($pass == $f3['pw']) {
        $_SESSION['proteccion'] = true;
        $_SESSION['id_usuarios'] = $f3['id_usuarios'];
        $_SESSION['usuario'] = $f3['usuario'];
        $_SESSION['nombre'] = $f3['nombre'];
        echo "<script>location.href='principal.php'</script>";

    }
}


//condicion de loggeo de usuarios normales
$query2="SELECT * FROM login WHERE usuario=? ";
$prl=$mysql->execute($query2,array($username));
if(count($prl)>0){
    $f  = $prl[0];
    if($pass==$f['pww']){
        $_SESSION['proteccion'] = true;
        $_SESSION['id_usuarios']=$f['id_usuarios'];
        $_SESSION['usuario']=$f['usuario'];


        header("Location: ../index.php");
    }else{
     echo   '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
        echo "<script>location.href='../index.php'</script>";



    }
}else{

    echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
    echo "<script>location.href='../index.php'</script>";



}

?>

</body>
</html>
