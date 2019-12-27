<?php
include "arriba.php";
include "Funciones.php";
//session_start();
if(!isset($_SESSION['matriz'])){
    $_SESSION['matriz']=[];
}
$cant = count($_SESSION['matriz']);
?>
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="container">
                <h2>Listado de productos</h2>
                <div class="panel-group">
                    <div class="panel panel-success">
                        <div class="panel-heading">Selecciones los productos
                            <button class="btn btn-danger" onclick="Limpiar()">Limpiar</button>
                            <?php 
                                if($cant>0){
                                    ?>
                                    <button class="btn btn-primary" onclick="Pagar()">Pagar</button>
                                    <?php
                                }
                                
                            ?>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <?php
                                $contador = 0;
                                for ($i = 0; $i < $cant; $i++) {
                                    $matriz = $_SESSION['matriz'];
                                    $llave = key($matriz[$i]);
                                    $consulta = "select * from producto where id in(" . $llave . ")";
                                    $resultado = queryLog($consulta);
                                    while ($cl = mysqli_fetch_array($resultado)) {
                                        if ($contador == 0) {
                                            printf("<tr>");
                                            printf("<td>");
                                        } else {
                                            printf("<td>");
                                        }
                                ?>
                                        <div class="card" style="width: 18rem;">
                                            <img src="<?php echo $cl[6]; ?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $cl[1]; ?></h5>
                                                <p class="card-text"><?php echo $cl[2]; ?></p>
                                                <p>Cantidad <?php echo $matriz[$i][$llave]; ?></p>

                                                <label for="">Precio </label>
                                                <h4>Q. <?php echo $cl[3] * $matriz[$i][$llave]; ?></h4>

                                                <button class="btn btn-danger" onclick="Remover(<?php echo $cl[0]; ?>)">Remover</button>
                                            </div>
                                        </div>
                                <?php
                                        $contador++;
                                        if ($contador == 5) {
                                            $contador = 0;
                                            printf("</td>");
                                            printf("</tr>");
                                        } else {
                                            printf("</td>");
                                        }
                                    }
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
<script text="text/javascript">
    function Agregar(id) {
        let num = document.getElementById('cant').value;
       window.location='Compra.php?id='+id+'&cantidad='+num+'&fun=0'; 
    }
    function Limpiar(){
        window.location='Compra.php?fun=2'; 
    }
    function Remover(id){
        window.location='Compra.php?fun=1&id='+id;
    }
    function Pagar(){
        window.location='Pagar.php';
    }
</script>
<?php
include "abajo.php";
?>