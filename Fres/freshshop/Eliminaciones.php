<?php
include "Funciones.php";
if (isset($_GET['fu'])) {
    echo  $_GET['fu'];
    if ($_GET['fu'] == 1) {
        $id = $_GET['id'];
        $consulta = "delete from proveedor where id=\"" . $id . "\";";
        $resul=queryLog($consulta);
        echo $resul;
        //regresamos al listado
        header("Location: ListadoProveedores.php");
        exit; 
    } else if ($_GET['fu'] == 2) {
    }
}
