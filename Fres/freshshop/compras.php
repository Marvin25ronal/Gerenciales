<?php
include "arriba.php";
include "Funciones.php";
if (isset($_GET['patron'])) {
} else {
    $consulta = "select * from producto";
    $resultado = queryLog($consulta);
}
?>
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="container">
                <h2>Listado de productos</h2>
                <div class="panel-group">
                    <div class="panel panel-success">
                        <div class="panel-heading">Selecciones los productos</div>
                        <div class="panel-body">
                            <table class="table">
                                <?php
                                $contador = 0;

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
                                            <p>Disponibilidad <?php echo $cl[5]; ?></p>
                                            <h4>Q. <?php echo $cl[3]; ?></h4>
                                            <label for="">Cantidad</label>
                                            <input type="number" id="cant<?php echo $cl[0]; ?>" min="1" pattern="^[0-9]+" value=1>
                                            <br>
                                            <br>
                                            <button class="btn btn-info" onclick="Agregar(<?php echo $cl[0]; ?>)">Agregar</button>
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
        let num = document.getElementById('cant'+id).value;
       window.location='Compra.php?id='+id+'&cantidad='+num+'&fun=0'; 
    }
</script>
<?php
include "abajo.php";
?>