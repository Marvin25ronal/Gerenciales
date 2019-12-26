<?php
include "arriba.php";
include "connection.php";


$action = "Guardar";

if (isset($_GET["acc"])) {
    if ($_GET["acc"] == "Guardar") {
        $var = sprintf(
            "insert into producto values(null, '%s' , '%s' , %d , %d , %d);",
            $_GET["nombre"],
            $_GET["desc"],
            $_GET["precio_venta"],
            $_GET["precio_compra"],
            $_GET["stock"]
        );

        query($var);
    } else {
        $var = sprintf(
            " update producto set nombre = '%s', descripcion = '%s' , precio_venta = '%d' , precio_compra = '%d' , stock = '%d'  where id = 1; ",
            $_GET["nombre"],
            $_GET["desc"],
            $_GET["precio_venta"],
            $_GET["precio_compra"],
            $_GET["stock"],
            $_GET["id"]
        );

        //     query($var);

        echo $var;
        query($var);
    }
}

$nombre = "";
$stock = 0;
$p_venta = 0;
$p_compra = 0;
$desc = "";

if(isset($_GET["el"])){
    $var = "delete from producto where id = " . $_GET["el"];
    query($var);
}

if (isset($_GET["up"])) {
    $action = "Modificar";
    $res = query("select * from producto where id = " . $_GET["up"]);

    while ($cl = mysqli_fetch_array($res)) {
        $nombre = $cl["nombre"];
        $stock = $cl["stock"];
        $p_venta = $cl["precio_venta"];
        $p_compra = $cl["precio_compra"];
        $desc = $cl["descripcion"];
    }
}

?>


<div class="latest-blog">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Fruti Licuados</h1>
                    <p>La vida es corta, comete el postre primero.</p>
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
                            <label>Stock</label>
                            <input name="stock" value="<?php echo $stock; ?>" type="number" step="1" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Precio de venta</label>
                            <input name="precio_venta" value="<?php echo $p_venta; ?>" type="number" step="0.01" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Precio de compra</label>
                            <input name="precio_compra" value="<?php echo $p_compra; ?>" type="number" step="0.01" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Descripcion</label>
                            <textarea class="form-control" name="desc" rows="3"><?php echo $desc; ?></textarea>
                        </div>
                    </div>
                    <button name="acc" value="<?php echo $action; ?>" type="submit" class="btn btn-primary"><?php echo $action; ?></button>
                </form>

                <?php
                mostrartabla2("select id, nombre, precio_venta as 'precio de venta', precio_compra as 'precio de compra' , stock    from producto;", "Productos", "producto.php");
                ?>


            </div>
        </div>
    </div>
</div>






<?php
include "abajo.php";
?>