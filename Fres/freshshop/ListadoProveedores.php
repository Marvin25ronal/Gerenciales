<?php
include "arriba.php";
include "Funciones.php";


if (isset($_SESSION["tipo"])) {
    if ($_SESSION["tipo"] != "admin") {
?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
<?php
    }
}


if (isset($_GET['prov'])) {
    $patron=$_GET['prov'];
    $consulta="select * from proveedor where nombre_contacto like '%".$patron."%';";
    $resultado = queryLog($consulta);
} else {
    $consulta = "SELECT * FROM PROVEEDOR;";
    $resultado = queryLog($consulta);
}
?>
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="container">
                <h2>Crear Proveedor</h2>
                <div class="panel-group">

                    <div class="panel panel-success">
                        <div class="panel-heading">Proveedores</div>
                        <div class="panel-body">
                            <form class="form-search">
                                <div class="input-group">
                                    <input class="form-control form-text" name="prov" maxlength="128" placeholder="Buscar" size="15" type="text" />
                                    <span class="input-group-btn"><button class="btn btn-primary"><i class="fa fa-search fa-lg">&nbsp;</i></button></span>
                                </div>
                            </form>
                            <table class="table">
                                <tr>
                                    <td>No</td>
                                    <td>Empresa</td>
                                    <td>Nombre empleado</td>
                                    <td>Telefono</td>
                                    <td>Direccion</td>
                                    <td>Editar</td>

                                </tr>
                                <?php
                                $contador = 0;
                                while ($cl = mysqli_fetch_array($resultado)) {

                                ?>
                                    <tr>
                                        <?php
                                        printf("<td>%s</td>", $contador);
                                        printf("<td>%s</td>", $cl[1]);
                                        printf("<td>%s</td>", $cl[2]);
                                        printf("<td>%s</td>", $cl[3]);
                                        printf("<td>%s</td>", $cl[4]);
                                        // printf("<td>%s</td>",$cl[5]);
                                        ?>
                                        <td>
                                            <a href="CrearProveedor.php?id= <?php echo $cl[0];?>">
                                                <button type="button" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </a>
                                            <a href="Eliminaciones.php?fu=1&id=<?php echo $cl[0];?>">
                                                <button type="button" class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>


                                <?php

                                    $contador++;
                                }
                                ?>
                            </table>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<?php
function eliminar($id){
    
}
include "abajo.php";
?>