<?php
//session_start();
if(isset($_SESSION['usr_id'])) {
	header("Location: index.php");
}

include_once 'Funciones.php';

//Establece el error de validación como flag
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$name =  $_POST['name'];
	$usuario = $_POST['usuario'];
	$password =$_POST['password'];
	$cpassword = $_POST['cpassword'];
	$terminosycond =$_POST['terminosycond'];
	$rol =$_POST['campoSelect'];
	
	//Nombre sólo puede contener caracteres alfabéticos y espacio (esto varia sgun requerimiento)
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "El nombre debe contener solo caracteres del alfabeto y espacio.";
	}
	if(!preg_match("/^[a-zA-Z0-9_]+$/",$usuario)) {
		$error = true;
		$usuario_error = "Ingresa un usuario válido.";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "La contraseña debe tener un mínimo de 6 caracteres.";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Las contraseñas no coinciden";
	}
	if(!$terminosycond) {
		//$error = true;
		//$terminosycond_error = "Debes aceptar Terminos y condiciones";
	}
	if(!$rol) {
		//$error = true;
		//$terminosycond_error = "Debes aceptar Terminos y condiciones";
	}
	if (!$error) {
		$consulta="INSERT INTO usuarios(name,usuario,password,rol) VALUES('" . $name . "', '" . $usuario . "', '" . md5($password) . "','" . $rol . "')";
		$result=queryLog($consulta);
		if($result) {
			//$successmsg = "¡Registrado exitosamente! <a href='login.php'>Click here to Login</a>";
			$successmsg = '
			  <div class="alert alert-success alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>EXITO.!</strong> ¡Registrado exitosamente!
			  </div>
			  ';
		} else {
			//$errormsg = "Error de registro. Vuelve a intentarlo más tarde.";
			$errormsg = '
			<div class="alert alert-danger alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Error de registro.!</strong> Verifica tus datos.
			</div>
			';
		}
	}
}
?>

<?php
include "arriba.php";
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Registro</legend>

					<div class="form-group">
						<label for="name">Generales</label>
						<input type="text" name="name" placeholder="Nombres Completos" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Usuario</label>
						<input type="text" name="usuario" placeholder="Usuario" required value="<?php if($error) echo $usuario; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($usuario_error)) echo $usaurio_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Contraseña</label>
						<input type="password" name="password" placeholder="Contraseña" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Repita Contraseña</label>
						<input type="password" name="cpassword" placeholder="Confirmar Contraseña" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

	                   <div class="form-group">
	                   	<label for="name">Rol</label>
	                   	<br>
						 <select name="campoSelect">
			            <option value="1">Administrador</option>
			            <option value="2">Empleado</option>
			            </select>
					</div>

					
					<div class="checkbox">
					    <label>
					      <input type="checkbox" name="terminosycond" id="terminosycond" required=""> Acepto todos los 
					      <!-- Button trigger modal -->
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#TernimosCondiciones">
							  Terminos y condiciones
							</button>
							<br>
							<span class="text-danger"><?php if (isset($terminosycond_error)) echo $terminosycond_error; ?></span>
					    </label>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Registrar" class="btn btn-success" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Ya te registaste? <a href="login.php">Logeate Aqui</a>
		</div>
	</div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php
include "abajo.php";
?>


<!-- Modal -->
<div class="modal fade" id="TernimosCondiciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
        	<b>Terminos y Condiciones </b>
        </h4>
      </div>
      <div class="modal-body">
        Mediante la simple utilización de la herramienta FrutiLicuados, el Usuario reconoce haber leído y acepta los términos expuestos en el presente Acuerdo y / o las políticas que formen parte del mismo.
        <br>
        <br>
        <p>
        	<b>Uso de la cuenta de usuario en FrutiLicuados</b>
        </p>
		<p>
			<ul>
				<li>El usuario de FrutiLicuados se compromete a proporcionar mediante su registro datos veraces, exactos y completos sobre su identidad. También se compromete a revisar periódicamente la información proporcionada y garantiza la validez y la vigencia de los datos asociados tanto a su cuenta de usuario como a los productos y servicios contratados. El incumplimiento de esta condición podrá motivar la cancelación de la cuenta y la denegación al usuario el acceso a los servicios de Registros.com de forma temporal o permanente.</li>
				<li>FrutiLicuados se reserva el derecho de solicitar la verificación y / o actualización de la información proporcionada por el Cliente, quien deberá responder satisfactoriamente a la petición de Registros.com en el plazo máximo de 5 días laborables. El Cliente entiende y acepta que el no cumplimiento de este requisito constituye una vulneración del presente Acuerdo y puede dar lugar a la cancelación de los productos y/o servicios cont...</li>
				<br>
				<a href="#" class="btn btn-default btn-xs">
					<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> Descargar PDF
				</a>
			</ul>
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <!--button type="button" class="btn btn-primary">Guardar Cambios</button-->
      </div>
    </div>
  </div>
</div>

<script>
	//Modal terminos y condiciones
	$('#TernimosCondiciones').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
</script>