<?php
include "arriba.php";
include "Funciones.php";
if(isset($_POST["submit"])){
    $empresa = $_POST['empresa'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $insertar = "insert into proveedor(nombre_empresa,nombre_contacto,telefono_contacto,direccion) values (\"" . $empresa . "\",\"" . $nombre . "\",\"" . $direccion . "\",\"" . $telefono . "\");";
    $resultado = queryLog($insertar);
    if ($resultado === "NO hay servidor" || $resultado === "no hay bd" || $resultado === "algo salio mal") {
        ?>
        <div class="alert alert-success"> <?php echo $resultado ?>
        </div>
    <?php
       
    } else {
        ?>
        <script type="text/javascript">
            window.location="index.php";
        </script>
        <?php
    }
}else if(isset($_GET['id'])){
    
}
?>
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="container">
                <h2>Crear Proveedor</h2>
                <div class="panel-group">

                    <div class="panel panel-success">
                        <div class="panel-heading">Llenar los campos</div>
                        <div class="panel-body">
                            
                            

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