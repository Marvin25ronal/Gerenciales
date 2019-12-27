<?php
include "arriba.php";
include "Funciones.php"
 ?>
 <div class="latest-blog">
   <div class="container">
     <?php
        if (isset($_GET['prov'])) {
    $patron=$_GET['prov'];
    $consulta="select pedido_cliente.id, cliente.nombre_completo, detalle_cliente.cantidad, SUM(detalle_cliente.cantidad*detalle_cliente.precio) AS Total from detalle_cliente, pedido_cliente, cliente where id_pedido=pedido_cliente.id AND pedido_cliente.cliente=cliente.id AND pedido_cliente.id = '%".$patron."%';";
    $resultado = queryLog($consulta);
} else {
    $consulta = "select pedido_cliente.id, cliente.nombre_completo, detalle_cliente.cantidad, SUM(detalle_cliente.cantidad*detalle_cliente.precio) AS Total from detalle_cliente, pedido_cliente, cliente where id_pedido=pedido_cliente.id AND pedido_cliente.cliente=cliente.id;;";
    $resultado = queryLog($consulta);
}
?>
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="container">
                <h2>Reporte Facturas</h2>
                <div class="panel-group">

                    <div class="panel panel-success">
                        <div class="panel-heading">Factura</div>
                        <div class="panel-body">
                            <form class="form-search">
                                <div class="input-group">
                                    <input class="form-control form-text" name="prov" maxlength="128" placeholder="Buscar" size="15" type="text" />
                                    <span class="input-group-btn"><button class="btn btn-primary"><i class="fa fa-search fa-lg">&nbsp;</i></button></span>
                                </div>
                            </form>
                            <table class="table">
                                <tr>
                                    <td>#</td>
                                    <td>Numero</td>
                                    <td>Nombre</td>
                                    <td>cantidad</td>
                                    <td>Total</td>
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
                                        ?>
                                        
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
     
   </div>
 </div>
 <?php
include "abajo.php";
  ?>
