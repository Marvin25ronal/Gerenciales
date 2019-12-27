<?php
include "arriba.php";
include "connection.php";


if (isset($_SESSION["tipo"])) {
    if ($_SESSION["tipo"] != "admin") {
?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
<?php
    }
}

$action = "Guardar";

if (isset($_GET["acc"])) {
    if ($_GET["acc"] == "Guardar") {
        $var = sprintf(
            "insert into administrador values(null , '%s' , '%s' , '%s');",
            $_GET["nombre"],
            $_GET["nick"],
            $_GET["pass"]
        );

        query($var);
    } else {
        $var = sprintf(
            " update administrador set nombre = '%s', user_name = '%s' , pass  = '%s'   where id = %d; ",
            $_GET["nombre"],
            $_GET["nick"],
            $_GET["pass"],
            $_GET["id"]
        );

        //     query($var);

        //echo $var;
        query($var);
    }
}

$nombre = "";
$nick = "";
$pass = "";


if (isset($_GET["el"])) {
    $var = "delete from administrador  where id = " . $_GET["el"];
    query($var);
}

if (isset($_GET["up"])) {
    $action = "Modificar";
    $res = query("select * from administrador where id = " . $_GET["up"]);

    while ($cl = mysqli_fetch_array($res)) {
        $nombre = $cl["nombre"];
        $nick = $cl["user_name"];
        $pass = $cl["pass"];
    }
}

?>


<div class="latest-blog">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Crear administrador</h1>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>


        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">


                <form>
                    <?php

                    if (isset($_GET["up"])) {
                    ?>

                        <input name="id" type="hidden" value="<?php echo $_GET["up"]; ?>" class="form-control">
                    <?php

                    }

                    ?>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            <input name="nombre" type="text" value="<?php echo $nombre; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <input name="nick" value="<?php echo $nick; ?>" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pass</label>
                            <input name="pass" value="<?php echo $pass; ?>" type="password" class="form-control">
                        </div>
                    </div>
                    <br>
                    <button name="acc" value="<?php echo $action; ?>" type="submit" class="btn btn-primary"><?php echo $action; ?></button>
                    <br>
                </form>

                <br>
                <?php
                mostrartabla2("select id, nombre , user_name as 'nick name' from administrador;", "Administradores", "registrar_admins.php");
                ?>


            </div>
        </div>
    </div>
</div>






<?php
include "abajo.php";
?>