<?php
if (isset($_GET['fun'])) {
    //Registrar compra y regresar
    $fun = $_GET['fun'];
    if ($fun == 0) {
        $id = $_GET['id'];
        $cantidad = $_GET['cantidad'];

        Agregar($id, $cantidad);
    } else if ($fun == 2) {
        session_start();
        $_SESSION['matriz'] = [];
        header("Location: compras.php");
    } else if ($fun == 1) {
        session_start();
        $id = $_GET['id'];
        $llave = 0;
        $nueva=[];
        for ($i = 0; $i < count($_SESSION['matriz']); $i++) {
            $matriz = $_SESSION['matriz'];
            if (key($matriz[$i]) == $id) {
                continue;
            }
            $nueva[$llave]=$matriz[$i];
            $llave++;
        }
        $_SESSION['matriz']=$nueva;
        print_r($nueva);
        header("Location: ver_carro.php");
    }
}
function Agregar($id, $cantidad)
{
    session_start();
    //session_destroy();
    if (isset($_SESSION['matriz'])) {

        $matriz = $_SESSION['matriz'];
    } else {
        $matriz = [];
    }
    $count = count($matriz);
    print($count);
    for ($i = 0; $i < $count; $i++) {
        $llave = key($matriz[$i]);
        if ($llave == $id) {
            //se suma
            $arreglo = $matriz[$i];
            $arreglo[$llave] = $cantidad + $arreglo[$llave];
            $matriz[$i] = $arreglo;
            $_SESSION['matriz'] = $matriz;
            print_r($matriz);
            header("Location: compras.php");
            return;
        }
    }
    $nuevo = array($id => $cantidad);
    array_push($matriz, $nuevo);
    print_r($matriz);
    $_SESSION['matriz'] = $matriz;
    header("Location: compras.php");
}
