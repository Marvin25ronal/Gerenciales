<?php
include "arriba.php";
include "Funciones.php";
$consulta = "select p.id, c.nombre_completo,c.nit,p.fecha from cliente as c, pedido_cliente as p where c.id=p.cliente ;";
$resultado = queryLog($consulta);
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
                                    <td>No Factura</td>
                                    <td>Cliente</td>
                                    <td>Nit</td>
                                    <td>Fecha</td>
                                    <td>Accion</td>
                                </tr>
                                <?php
                                while ($cl = mysqli_fetch_array($resultado)) {
                                    printf("<tr>");
                                    printf("<td>%s</td>", $cl[0]);
                                    printf("<td>%s</td>", $cl[1]);
                                    printf("<td>%s</td>", $cl[2]);
                                    printf("<td>%s</td>", $cl[3]);
                                ?>
                                    <td>
                                        <a href="DetalleFactura.php?id= <?php echo $cl[0]; ?>">
                                            <button type="button" class="btn btn-info">
                                                <span class="glyphicon glyphicon-zoom-in"></span>
                                            </button>
                                        </a>
                                        
                                    </td>
                                    </tr>


                                <?php

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
include "abajo.php";
?>