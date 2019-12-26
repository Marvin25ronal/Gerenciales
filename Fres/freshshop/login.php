<?php
session_start();
if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}
include_once 'Funciones.php';
//Comprobar de envío el formulario
if (isset($_POST['login'])) {

	$usuario =  $_POST['usuario'];
	$password = $_POST['password'];
	$consulta =  "SELECT * FROM usuarios WHERE usuario = '" . $usuario. "' and password = '" . md5($password) . "'";
    $result=queryLog($consulta);
	if ($row = mysqli_fetch_array($result)) {
		if($row['rol']=="1"){
			$_SESSION['usr_id'] = $row['id'];
			$_SESSION['usr_rol'] = $row['rol'];
			$_SESSION['usr_name'] = $row['name'];
			
			 $errormsg = "eres Administrador";
			  header("Location: index.php");
		}
		if($row['rol']=="2"){
			$_SESSION['usr_id'] = $row['id'];
			$_SESSION['usr_name'] = $row['name'];
			
			$errormsg = "eres Empleado";
			header("Location: index.php");
		}else
		$errormsg = "No existe cuenta";
	} else {
		$errormsg = "Revisa los datos!!!";
	}
}
?>
<?php
include "arriba.php";
?>


<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>
					<!--div class="form-group clearfix">
						<img src="http://www.iconsfind.com/wp-content/uploads/2016/10/20161014_58006bff8b1de.png" alt="" width="200px" class="img-responsive img-circle" style="margin:0 auto">
					</div-->

					<div class="form-group">
						<label for="name">Usuario</label>
						<input type="text" name="usuario" placeholder="Ingresar Usuario" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Contraseña</label>
						<input type="password" name="password" placeholder="Ingresar Contraseña" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Iniciar Sesion" class="btn btn-success" />
						<input type="reset" value="Limpiar" class="btn btn-default" >
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		No tienes cuenta? <a href="Registrar-Usuario.php">Regitrate aqui</a>
		</div>
	</div>
</div>

<?php
include "abajo.php";
?>
