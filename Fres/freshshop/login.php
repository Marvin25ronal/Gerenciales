<?php
include "arriba.php";
include "connection.php";




if (isset($_SESSION["tipo"])) {

    if (isset($_GET["log"])) {
        session_destroy();
    } ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
    <?php
    
}

$bool = true;
if (isset($_POST["submit"])) {




    $bool = $_POST["tipo"] == "cliente";


    $var = $bool  ? "select * from cliente "  : "select * from administrador ";


    $var = sprintf(
        "%s   where user_name = '%s' and pass = '%s'",
        $var,
        $_POST["nick"],
        $_POST["pass"]
    );
    $res = query($var);


    $entro = false;
    while ($cl = mysqli_fetch_array($res)) {
        $entro = true;
        if (!$bool) {
            $_SESSION["tipo"] = "admin";
        } else {
            $_SESSION["tipo"] = "client";
        }
        $_SESSION["nick"] = $_POST["nick"];
    ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
    <?php
    }

    if (!$entro) {
    ?>
        <div class="alert alert-warning"> Usuario o password incorrecta.
        </div>
<?php
    }
}


?>
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="container">

                <?php if ($bool) { ?>
                    <br />
                    <br />
                    <br />
                <?php } ?>
                <h2>Login.</h2>


                <?php if ($bool) { ?>
                    <br />
                    <br />
                    <br />
                <?php }
                ?>
                <div class="panel-group">

                    <div class="panel panel-success">
                        <div class="panel-heading">Identificarse</div>
                        <div class="panel-body">

                            <form method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NICK</label>
                                    <input type="text" class="form-control" name="nick" required>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" name="pass" required>
                                </div>



                                <div>
                                    <input type="radio" name="tipo" value="cliente" checked>
                                    <label for="huey">Cliente</label>
                                </div>

                                <div>
                                    <input type="radio" name="tipo" value="admin">
                                    <label for="dewey">Administrador</label>
                                </div>

                                <input type="submit" name="submit" value="Login" class="btn btn-info">
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