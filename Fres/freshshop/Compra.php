<?php
include "Funciones.php";
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
    }else if($fun==3){
       // Pagar();
    }
}else if(isset($_POST['total'])){
    
    session_start();
    $consulta1="insert into pedido_cliente values(null,".$_SESSION['id'].",NOW(),0);";

    $info=queryLog($consulta1);
    $consulta2="select * from pedido_cliente order by id DESC limit 1;";
    $ultimo=queryLog($consulta2);
    $cl=mysqli_fetch_array($ultimo);
    $id=$cl[0];
    $cant=count($_SESSION['matriz']);
    for($i=0;$i<$cant;$i++){
        $arreglo=$_SESSION['matriz'][$i];
        $idproducto=key($arreglo);
        $cantidad=$arreglo[$idproducto];
        $consulta4="Select * from producto where id=".$idproducto.";";
        $resprecio=queryLog($consulta4);
        $precio=mysqli_fetch_array($resprecio);
        $consulta3="insert into detalle_cliente values(null,".$id.",".$idproducto.",".$cantidad.",".$precio[3].");";
        queryLog($consulta3);
        $ultimaconsulta="update producto set stock=stock-".$cantidad." where id=".$idproducto.";";
        queryLog($ultimaconsulta);
    }
    $_SESSION['matriz']=[];
    header("Location: index.php");
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
function Pagar(){
    session_start();

}

