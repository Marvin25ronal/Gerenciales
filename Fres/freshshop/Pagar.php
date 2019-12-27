<?php
include "arriba.php";
include "Funciones.php";
$consulta1 = "Select * from cliente where id=" . $_SESSION['id'] . ";";
$cliente = queryLog($consulta1);
?>
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="container">
                <h2>Comprobante</h2>
                <div class="panel-group">
                    <div class="panel panel-info">
                        <div class="panel-heading">Este es el comprobante de compra</div>
                        <div class="panel-body">
                            <?php $cl = mysqli_fetch_array($cliente); ?>
                            <form action="Compra.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User</label>
                                    <input type="text"  class="form-control" value=" <?php echo $cl[1];?>" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre del cliente</label>
                                    <input type="text"  class="form-control" value=" <?php echo $cl[3];?>" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label>
                                    <input type="text"  class="form-control" value=" <?php echo $cl[4];?>" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Direccion</label>
                                    <input type="text"  class="form-control" value=" <?php echo $cl[5];?>" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nit</label>
                                    <input type="text"  class="form-control" value=" <?php echo $cl[6];?>" readonly >
                                </div>
                                <?php 
                                    $contador=0;
                                    $sumatoria=0;
                                    $cant=count($_SESSION['matriz']);
                                    for($i=0;$i<$cant;$i++){
                                        $arreglo=$_SESSION['matriz'][$i];
                                        $llave=key($arreglo);
                                        $cantidad=$arreglo[$llave];
                                        $consulta2="Select * from producto where id=".$llave.";";
                                        $res=queryLog($consulta2);
                                        $cl2=mysqli_fetch_array($res);
                                        $sumatoria+=$cl2[3]*$cantidad;
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total</label>
                                    <input type="text" name="total" class="form-control" value="Q. <?php echo $sumatoria;?>" readonly >
                                </div>
                                <input type="submit" class="btn btn-primary" value="Confirmar">
                            </form>
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