<?PHP

function query($query)
{
    include "Contra.php";

    // creación de la conexión a la base de datos con mysql_connect()
    $conexion = mysqli_connect($servidor, $usuario, $password) or die("NO hay servidor");

    // Selección del a base de datos a utilizar
    $db = mysqli_select_db($conexion, $basededatos) or die("no hay bd");
    $resultado = mysqli_query($conexion, $query) or die("algo salio mal");
    return  $resultado;
}

function quer2($query, $conexion)
{
    $resultado = mysqli_query($conexion, $query) or die("algo salio mal :(");
    return  $resultado;
}



function mostrartabla($consulta, $tittle)
{

?>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h2 align="center"><?php echo $tittle; ?></h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php
                        $resultado = query($consulta);
                        $info_campo = $resultado->fetch_fields();
                        $ncolumnas = 0;
                        foreach ($info_campo as $valor) {
                            printf("<td><h4>%s</h4></td>",   $valor->name);
                            $ncolumnas++;
                        }
                        $ncolumnas -= 1;
                        ?>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $nreg = 0;
                    while ($cl = mysqli_fetch_array($resultado)) {
                        //echo $cl;
                        $nreg++;
                        print('<tr>');
                        $aux = false;
                        foreach ($cl as $valor) {
                            if ($aux == true) {
                                $aux = false;
                                continue;
                            }
                            $aux = true;
                            printf("<td>%s</td>",   $valor);
                        }
                        print('</tr>');
                    }
                    if ($ncolumnas == 0) {
                        print("<tr>
								<td align='right'># " . $nreg . "</td>
						</tr>");
                    } else {
                        print("<tr>
								<td colspan='" . $ncolumnas . "'></td><td align='right'># " . $nreg . "</td>
						</tr>");
                    }
                    $resultado->free();

                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
}




function mostrartabla2($consulta, $tittle, $url)
{

?>

    <div class="panel panel-default">
        <!-- Default panel contents -->

        <div class="panel-heading">
            <h2 align="center"><?php echo $tittle; ?></h2>
        </div>
      

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php
                        $resultado = query($consulta);
                        $info_campo = $resultado->fetch_fields();
                        $ncolumnas = 0;
                        foreach ($info_campo as $valor) {
                            printf("<td><h4>%s</h4></td>",   $valor->name);
                            $ncolumnas++;
                        }
                        $ncolumnas += 1;
                        ?>
                        <td>Modificar</td>
                        <td>Eliminar</td>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $nreg = 0;
                    while ($cl = mysqli_fetch_array($resultado)) {
                        //echo $cl;
                        $nreg++;
                        print('<tr>');
                        $aux = false;
                        $nn = true;
                        foreach ($cl as $valor) {
                            if ($aux == true) {
                                $aux = false;
                                continue;
                            }
                            if ($nn) {
                                $nn = false;
                                $id = $valor;
                            }
                            $aux = true;
                            printf("<td>%s</td>",   $valor);
                        }
                    ?>
                        <td><a class="btn btn-success" href="<?php echo $url . "?up=" . $id ?>">Modificar</a></td>
                        <td><a class="btn btn-danger" href="<?php echo $url . "?el=" . $id ?>">Eliminar</a></td>
                    <?php
                        print('</tr>');
                    }
                    if ($ncolumnas == 0) {
                        print("<tr>
								<td align='right'># " . $nreg . "</td>
						</tr>");
                    } else {
                        print("<tr>
								<td colspan='" . $ncolumnas . "'></td><td align='right'># " . $nreg . "</td>
						</tr>");
                    }
                    $resultado->free();

                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
}



?>