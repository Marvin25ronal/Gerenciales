<?php
	function queryLog( $query ) {
		/*$usuario = "root";
		$password = "pensa";
		$servidor = "localhost:3306";
		$basededatos = "db_votos";
		*/
		include __DIR__."\Contra.php";
		// creación de la conexión a la base de datos con mysql_connect()
		$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");
		// Selección del a base de datos a utilizar
		$db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );
		$resultado = mysqli_query( $conexion, $query ) or die ( "algo salio mal");
		return  $resultado;
	}
?>