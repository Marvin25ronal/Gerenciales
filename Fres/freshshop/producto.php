<?php
include "arriba.php";
include "connection.php";


if (isset($_GET["acc"])) {
    if ($_GET["acc"] == "Guardar") {
        $var = sprintf("insert into producto values(null, 'nn' , 'desc' , 10 , 8 , 20);");

        echo $var;
    } else {
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
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            <input name="nombre" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Stock</label>
                            <input name="stock" type="number" step="1" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Precio de venta</label>
                            <input name="precio_venta" type="number" step="0.01" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Precio de compra</label>
                            <input name="precio_compra" type="number" step="0.01" class="form-control">
                        </div>
                    </div>
                    <button name="acc" value="Guardar" type="submit" class="btn btn-primary">Guardar</button>
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