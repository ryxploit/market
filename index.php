

<html>
<head>
    <meta charset="UTF-8">
    <title>Market</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">




</head>
<body>
<div class="col-md-12 headi">
    <header class="container-fluid">
        <strong>Market</strong>
    </header>
</div>



<div class="col-md-3 formulario">
    <div class="perfil ">
        <img src="images/user.png" class="log">
    </div>
    <form class="form-group " action="php/validador.php" method="post">

        <div class="campos">
        <div class="inner-addon left-addon">
            <i class="glyphicon glyphicon-user"></i>
            <input type="text" name="usuario" class="form-control" placeholder="Usuario" required id="micampo"/>
        </div>
        <br>
        <div class="inner-addon left-addon">
            <i class="glyphicon  glyphicon-lock"></i>
            <input type="password" name="contra" class="form-control" placeholder="Contraseña" required id="micampo"/>
        </div>
<br>
            <div class="btne">
        <button  class="btn btn-danger btn-lg" onclick="mostrar()">
            <span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> Entrar

        </button>
                <div id='oculto' style='display:none;'>
                    <i class="fa fa-spinner fa-spin fa-3x fa-fw" style="font-size:48px;color:red"></i>

                </div>
            </div>
            </div>

    </form>
</div>
<script type="text/javascript">
   function mostrar(){
        document.getElementById('oculto').style.display = 'block';}



</script>
<script  src="js/jquery-3.1.1.min.js"></script>
<script  src="js/bootstrap.min.js"></script>

<script>
    function validar() {
        //obteniendo el valor que se puso en campo text del formulario
        miCampoTexto = document.getElementById("micampo").value;
        //la condición
        if (miCampoTexto.length == 0) {
            return false;
        }
        return true;
    }
</script>

</body>
</html>
