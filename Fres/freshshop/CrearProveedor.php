<?php
include "arriba.php";
include "Funciones.php";
if (isset($_POST["submit"])) {
    $empresa = $_POST['empresa'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $insertar = "insert into proveedor(nombre_empresa,nombre_contacto,telefono_contacto,direccion) values (\"" . $empresa . "\",\"" . $nombre . "\",\"" . $telefono . "\",\"" . $direccion . "\");";
    if(isset($_POST['guardar'])){
        $insertar="update proveedor set nombre_empresa=\"".$empresa."\", nombre_contacto=\"".$nombre."\", telefono_contacto=\"".$telefono."\", direccion=\"".$direccion."\" where id=\"".$_POST['guardar']."\";";
    }
    $resultado = queryLog($insertar);
    if ($resultado === "NO hay servidor" || $resultado === "no hay bd" || $resultado === "algo salio mal") {
?>
        <div class="alert alert-success"> <?php echo $resultado ?>
        </div>
    <?php

    } else {
    ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
    <?php
    }
} else if (isset($_GET['id'])) {
    $consulta = "Select * from proveedor where id=" . $_GET['id'] . ";";
    $datos = queryLog($consulta);
}
if (isset($_GET['id'])) {
    $cl = mysqli_fetch_array($datos);
    ?>
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="container">
                    <h2>Actualizar Proveedor</h2>
                    <div class="panel-group">

                        <div class="panel panel-success">
                            <div class="panel-heading">Llenar los campos</div>
                            <div class="panel-body">

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre de la empresa</label>
                                        <input type="text" class="form-control" name="empresa" value="<?php echo $cl[1]; ?>" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre del proveedor</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo $cl[2]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Numero</label>
                                        <input type="tel" size="20" minlength="8" maxlength="8" class="form-control" name="telefono" value="<?php echo $cl[3]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Direccion</label>
                                        <input type="text" class="form-control" name="direccion" value="<?php echo $cl[4]; ?>" required>
                                    </div>
                                    <input type="text" name="guardar" hidden value="<?php echo $cl[0];?>">
                                    <input type="submit" name="submit" value="Guardar" class="btn btn-info">
                                </form>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    } else {
    ?>
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="container">
                    <h2>Crear Proveedor</h2>
                    <div class="panel-group">

                        <div class="panel panel-success">
                            <div class="panel-heading">Llenar los campos</div>
                            <div class="panel-body">

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre de la empresa</label>
                                        <input type="text" class="form-control" name="empresa" placeholder="Ingrese Nombre de la Empresa" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre del proveedor</label>
                                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre de la persona" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Numero</label>
                                        <input type="tel" size="20" minlength="8" maxlength="8" class="form-control" name="telefono" placeholder="Ingrese Numero telefonico" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Direccion</label>
                                        <input type="text" class="form-control" name="direccion" placeholder="Ingrese direccion de la persona" required>
                                    </div>
                                    <input type="submit" name="submit" value="Registrar Trabajo" class="btn btn-info">
                                </form>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
include "abajo.php";
?>