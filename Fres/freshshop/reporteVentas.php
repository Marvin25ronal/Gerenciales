<?php
include "arriba.php";
 ?>
 <div class="latest-blog">
   <div class="container">
     <?php
        $bdconectada = mysql_connect('localhost','root','123');
        $conexion = mysql_select_db('erp', $bdconectada);
        $query=" SELECT cliente, SUM(cantidad*precio) AS Total FROM detalle_cliente, pedido_cliente WHERE id=id_pedido";
        $result=mysql_query($query,$bdconectada)or die ("Problemas".mysql_error());
        ECHO "<table class='table table-striped'><th align='center'>Nombre</th><th align='center'>Total</th>";
        while (($fila = mysql_fetch_array($result, MYSQLI_ASSOC)) == TRUE){
            ECHO "<tr>";
            
                ECHO " <TD >".$fila["cliente"]."</TD>";
                ECHO " <TD >".$fila["Total"]."</TD>";
            
                
        ECHO"</tr>";
        }
        ECHO "</table>";
     ?>
   </div>
 </div>
 <?php
include "abajo.php";
  ?>
