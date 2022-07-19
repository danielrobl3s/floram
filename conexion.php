<?php 
require_once "global.php";
$conexion = new mysqli("localhost", "root", "", "floram");

if (!function_exists('ejecutarConsulta'))
{
	function ejecutarConsulta($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);
		#if (!mysqli_query($conexion,$sql)) {
  		#	return("Error description: " . mysqli_error($conexion));
		 #}
		 #else
		 #{
			return $query;
		#}
	#	return $query;
	}
	function ejecutarUpdate2($sql)
	{
		global $conexion;
		//$query = $conexion->query($sql);
		if (!mysqli_query($conexion,$sql)) {
  			return("Error description: " . mysqli_error($conexion));
		 }
		 else
		 {
			return mysqli_affected_rows($conexion);
		}
	#	return $query;
	}
	function ejecutarConteo($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);
		// $total = mysqli_num_rows($query);
		// mysqli_free_result($query);
		return $query;
		    

	#	return $query;
	}

	function ejecutarUpdate($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);
	
		if (!mysqli_query($conexion,$sql)) {
  			return("Error description: " . mysqli_error($conexion));
		 }
		 else
		 {
			return $query;
		}
	}
// Perform a query, check for error

	function ejecutarConsultaSimpleFila($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);		
		$row = $query->fetch_assoc();
		return $row;
	}

	function ejecutarConsulta_retornarID($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);		
		return $conexion->insert_id;			
	}
	
	function limpiarCadena($str)
	{
		global $conexion;
		$str = mysqli_real_escape_string($conexion,trim($str));
		return htmlspecialchars($str);
	}
}
?>