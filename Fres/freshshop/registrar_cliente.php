<?php
include "arriba.php";
include "Funciones.php";
if (isset($_POST["submit"])) {



    //nick=us&pass=pass&tel=47657228&name=nombre_completo&dir=dir&nit=123&submit=Registrar
    $var = sprintf(
        "insert into cliente values(null, '%s' , 'pass' , '%s' , '%s' , '%s' , '%s');",
        $_POST["nick"],
        $_POST["pass"],
        $_POST["name"],
        $_POST["tel"],
        $_POST["dir"],
        $_POST["nit"]
    );

    $resultado = queryLog($var);

    if ($resultado === "NO hay servidor" || $resultado === "no hay bd" || $resultado === "algo salio mal") {
?>
        <div class="alert alert-warning"> <?php echo $resultado ?>
        </div>
    <?php

    } else {
    ?>
        <div class="alert alert-success"> <?php echo $_POST["nick"] . " Registrado con exito." ?>
        </div>
<?php
    }
} else if (isset($_GET['id'])) {
}
?>
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="container">

                <br />
                <br />
                <br />
                <h2>Registrarse.</h2>
                <br>
                <br>
                <br>
                <div class="panel-group">

                    <div class="panel panel-success">
                        <div class="panel-heading">Llenar los campos</div>
                        <div class="panel-body">

                            <form method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User name</label>
                                    <input type="text" class="form-control" name="nick" required>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" class="form-control" name="pass" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label>
                                    <input type="tel" size="20" minlength="8" maxlength="8" class="form-control" name="tel" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre completo</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Direccion</label>
                                    <input type="text" class="form-control" name="dir" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIT</label>
                                    <input type="text" class="form-control" name="nit" required>
                                </div>
                                <input type="submit" name="submit" value="Registrar" class="btn btn-info">
                            </form>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "abajo.php";
?>