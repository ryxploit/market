
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



$query="SELECT * FROM login";
$resultados = $mysql->execute($query);









?>

<div id="usuarios">

    <!-- Modal registro -->
    <!-- Modal registro -->
    <div class="modal fade" id="myModalrg" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Cancelar</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Usuarios
                    </h4>
                </div>
                <form role="form" action="rgusuarios.php" method="post">
                    <!-- Modal Body -->
                    <div class="modal-body">


                            <div class="form-group">
                                <label >Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre"
                                       name="nombre"/>
                            </div>
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" class="form-control" placeholder="usuario"
                                       name="usuario"/>
                            </div>

                            <div class="form-group">
                                <label >Contraseña empleado</label>
                                <input type="text" class="form-control" placeholder="Contraseña empleado"
                                       name="pw"/>
                            </div>

                            <div class="form-group">
                                <label>contraseña administrador</label>
                                <input type="text" class="form-control" placeholder="contraseña administrador"
                                       name="pw_admin"/>
                            </div>


                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                                data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- fin Modal registro  -->

    <!-- Modal actualizar -->
    <div class="modal fade" id="myModalact" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Cancelar</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Usuarios
                    </h4>
                </div>
                <?php

                $query="SELECT * FROM login ";
                $resultados2 = $mysql->execute($query);


                foreach($resultados2 as $resultado){

                    $nombre = $resultado['nombre'];

                    ?>
                <form role="form" action="" method="post">
                    <!-- Modal Body -->
                    <div class="modal-body">


                        <div class="form-group">
                            <label >Nombre</label>
                            <input type="hidden" class="form-control" placeholder="Nombre"
                                   name="id" value=""/>
                        </div>

                        <div class="form-group">
                            <label >Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre"
                                   name="nombre" value="<?php echo $nombre  ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" placeholder="usuario"
                                   name="usuario"/>
                        </div>

                        <div class="form-group">
                            <label >Contraseña empleado</label>
                            <input type="text" class="form-control" placeholder="Contraseña empleado"
                                   name="pw"/>
                        </div>

                        <div class="form-group">
                            <label>contraseña administrador</label>
                            <input type="text" class="form-control" placeholder="contraseña administrador"
                                   name="pw_admin"/>
                        </div>


                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                                data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-success">Actualizar</button>

                    </div>
                </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>




    <!-- fin Modal actualizar  -->

    <!-- table usuarios-->
    <div class="row">

        <table id="tabla"  class="display data-results table  table-hover table-bordered">

            <div class="container-fluid rg" >
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalrg">
                    Registrar usuario
                </button>
            </div>
            <br>

            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Contraseña empleados</th>
                <th>Contraseña administrador</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($resultados as $resultado){
                $id = $resultado['id_usuarios'];
                ?>
                <tr>

                    <td><?=$id;?></td>
                    <td><?=$resultado['nombre'];?></td>
                    <td><?=$resultado['usuario'];?></td>
                    <td><?=$resultado['pw'];?></td>
                    <td><?=$resultado['pw_admin'];?></td>

                    <td>
                        <a href="#" style="margin-right:20px;" data-toggle="modal" data-target="#myModalact" ><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="javascript:eliminar(<?=$id?>);"><span class="glyphicon glyphicon-remove" style="color: red;"></a>
                        <form id="eliminar_<?=$id?>" action="delusuarios.php" method="post">
                            <input type="hidden" name="action" value="eliminar">
                            <input type="hidden" name="id" value="<?=$id?>">
                        </form>
                    </td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- /.table usuarios -->

</div>

    <script type="text/javascript">



        $('#tabla').DataTable();

        function eliminar(id){
            var r = confirm ("Estas seguro que deseas eliminar el registro "+id+"? ");

            if(r == true){
                $('#eliminar_'+id).submit();
            }
        }





    </script>