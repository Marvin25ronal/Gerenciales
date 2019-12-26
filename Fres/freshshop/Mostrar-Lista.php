<?php
include("Funciones.php");
include "arriba.php";
?>
		<br>
		<br>
		<br>
		<br>
		<div class="container">
		<div class="content">
		
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filtros de datos de empleados</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="1" <?php if($filter == '1'){ echo 'selected'; } ?>>Administrador</option>
						<option value="2" <?php if($filter == '2'){ echo 'selected'; } ?>>Empleado</option>
                     
					</select>
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Nombre</th>
					<th>Rol</th>
				
				</tr>
				<?php
				if($filter){
					$sql = "SELECT * FROM usuarios WHERE rol='$filter' ORDER BY id ASC";
					$result=queryLog($sql);
				}else{
					
					$sql = "SELECT * FROM usuarios ORDER BY id ASC";
					$result=queryLog($sql);
				}
				if(mysqli_num_rows($result) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					//$results=mysqli_query($conn,$recents)
					while($row = mysqli_fetch_assoc($result)){
						echo '
						<tr>
							<td>'.$no.'</td>
							
							<td><a href="profile.php?nik='.$row['name'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['name'].'</a></td>
                            
                           
							<td>';
							if($row['rol'] == '1'){
								echo '<span class="label label-success">Administrador</span>';
							}
                            else if ($row['rol'] == '2' ){
								echo '<span class="label label-info">Empleado</span>';
							}
                           
						
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
	<p>&copy; FrutiLicuados <?php echo date("Y");?></p
		</center>
	
<?php
include "abajo.php";
?>