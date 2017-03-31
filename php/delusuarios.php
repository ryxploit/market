<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

require_once ('conexion.php');
$mysql= new Connection();
$mysql->connect();

$mensaje="";

if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'eliminar':
            $id=$_POST['id'];
            $query="DELETE FROM login WHERE id_usuarios=?";
            $mysql->execute($query,array($id));
            $mensaje = "Eliminado";
            header("Location: administrador.php");
            break;

    }
}


?>

<script type="text/javascript">

    function eliminar(id){
        var r = confirm ("Estas seguro que deseas eliminar el registro "+id+"? ");

        if(r == true){
            $('#eliminar_'+id).submit();
        }
    }

    <?php
    if(strlen($mensaje) > 1){
    ?>
    $.notify("<?=$mensaje;?>");
    <?php
    }
    ?>


</script>
</body>
</html>