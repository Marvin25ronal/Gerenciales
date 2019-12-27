<?php
include "arriba.php";
include "Funciones.php";
$consulta1 = "select * from detalle_cliente where id_pedido=" . $_GET['id'] . ";";
$indices = queryLog($consulta1);
$sumatoria=0;
?>
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="container">
                <h2>Listado de Facturas</h2>
                <div class="panel-group">
                    <div class="panel panel-success">
                        <div class="panel-heading">Selecciones las facturas</div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>Producto</td>
                                    <td>Precio</td>
                                    <td>Cantidad</td>
                                </tr>
                                <?php
                                while ($cl = mysqli_fetch_array($indices)) {
                                    $consulta2 = "select * from producto where id=" . $cl[2] . ";";
                                    $res = queryLog($consulta2);
                                    $cl2 = mysqli_fetch_array($res);
                                    printf("<tr>");
                                    printf("<td>%s</td>", $cl2[1]);
                                    printf("<td>%s</td>", $cl2[3]);
                                    printf("<td>%s</td>", $cl[3]);
                                    $sumatoria+=$cl[3]*$cl2[3];
                                    printf("</tr>");
                                }
                                ?>

                            </table>
                            <h3>Total Q.<?php echo $sumatoria?></h3>
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