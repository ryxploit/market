<?php


session_start();

if (isset($_SESSION['proteccion']) && $_SESSION['proteccion'] == true) {

} else {
    //echo "Esta pagina es solo para usuarios registrados.<br>";
    //echo "<br><a href='login.php'>Login</a>";
    echo "<script>location.href='../index.php'</script>";

    exit;
}
require_once ('conexion.php');
$mysql= new Connection();
$mysql->connect();

$sql = "SELECT * FROM clientes";
$resultados2= $mysql->execute($sql);

$query="SELECT * FROM login";
$resultados = $mysql->execute($query);

$mensaje = "";


if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'eliminar':
            $id=$_POST['id'];
            $query="DELETE FROM login WHERE id_usuarios=?";
            $mysql->execute($query,array($id));
            $mensaje = "Eliminado";
            $_POST['action'] = null;
            break;
    }
}


$sql="SELECT * FROM login WHERE id_usuarios=1";

$ressql=$mysql->execute($sql);





?>
<html>
<head>
    <meta charset="UTF-8">
    <title>ADMINISTRADOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../css/simple-sidebar.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">


</head>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <h2>Market</h2>
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Activo"><i class="fa fa-user-circle" style="color: green;"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $_SESSION['nombre'];?> <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="cerrar_session.php"><i class="fa fa-fw fa-power-off"></i> cerrar sesion</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-user-plus"></i> Control<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="#"  onclick="cargartblusuarios('tblusuarios.php');"><i class="  fa fa-angle-double-right "></i>Usuarios</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Clientes</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  MENU 2 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.1</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.2</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="investigaciones/favoritas"><i class="fa fa-fw fa-user-plus"></i>  MENU 3</a>
                </li>
                <li>
                    <a href="sugerencias"><i class="fa fa-fw fa-paper-plane-o"></i> MENU 4</a>
                </li>
                <li>
                    <a href="faq"><i class="fa fa-fw fa fa-question-circle"></i> MENU 5</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Bienvenido Admin!</h1>
                </div>

            </div>
            <!-- /.row -->


                <div id="tblusuarios">

                </div>

            </div>

            </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->


<!-- jQuery -->
<script src="../js/jquery.js"></script>

<script src="../js/jquery.dataTables.js"></script>

<script src="../js/notify.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>


<script type="text/javascript">


    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $(".side-nav .collapse").on("hide.bs.collapse", function() {
            $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
        });
        $('.side-nav .collapse').on("show.bs.collapse", function() {
            $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
        });
    })


    $(document).ready(function(){

    });


    function cargartblusuarios(pagina){
        $.ajax({
            type: "POST",
            url: pagina,
            data: {},
            success: function(html){
                $("#tblusuarios").html(html);
            }
        });
    }


</script>


</body>
</html>