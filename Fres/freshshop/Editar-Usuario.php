<?php
include("Funciones.php");
include("arriba.php");
?>
	<div class="container">
		<div class="content">
				
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			if ( $_GET['nik']!=''){
			 $nik = $_GET["nik"];
			
			 $sql = "SELECT * FROM usuarios WHERE id='$nik'";
			 $result=queryLog( $sql );
			if(mysqli_num_rows($result) == 0){
				header("Location:Atualizar-Usuario.php");
			}else{
				$row = mysqli_fetch_assoc($result);
			}
			if(isset($_POST['save']) ){
				
				$id	     =      $_POST["codigo"];//Escanpando caracteres 
				$name		    =$_POST["name"];//Escanpando caracteres 
				$usuario	 = $_POST["usuario"];//Escanpando caracteres 
				$password	 = $_POST["password"];//Escanpando caracteres 
				$rol	     = $_POST["campoSelect"];//Escanpando caracteres 
				$actualizer = "UPDATE usuarios SET name='$name', usuario='$usuario', password='" . md5($password) . "', rol='$rol' WHERE id='$nik'" or die(mysqli_error());
				$update=queryLog($actualizer );
				
			
			}
			
			  }
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Id</label>
					<div class="col-sm-2">
						<input type="text" name="codigo" value="<?php echo $row ['id']; ?>" class="form-control" placeholder="id" required disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombres</label>
					<div class="col-sm-4">
						<input type="text" name="name" value="<?php echo $row ['name']; ?>" class="form-control" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-4">
						<input type="text" name="usuario" value="<?php echo $row ['usuario']; ?>" class="form-control" placeholder="Usuario" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Contraseña</label>
					<div class="col-sm-4">
						<input type="password" name="password" value="<?php echo base64_decode($row['password']); ?>" class="form-control" placeholder="password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Rol</label>
					<div class="col-sm-4">
						<input type="text" name="rol" value="<?php if($row['rol'] == '1'){ echo "Administrador";} else if ($row['rol'] == '2' ){echo "Empleado";} ?>" class="form-control" placeholder="Rol" required disabled>
					</div>
				</div>
				
				<div class="form-group">
	                   <label class="col-sm-3 control-label">Nuevo Rol</label>
	                   	<br>
						 <select name="campoSelect">
			            <option value="1">Administrador</option>
			            <option value="2">Empleado</option>
			            </select>
					</div>
				
				
			
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-success" value="Guardar datos">
						<a href="Actualizar-Usuario.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>

<?php
include "abajo.php";
?>


