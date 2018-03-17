<?php 
require_once "conexion.php";
class DireccionDeEntrega
{
	
	
 static public function mdlUpdateDireccionPedido($tabla,$datos){
 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET CelularClie=:CelularClie, Telefono=:Telefono, Direccion=:Direccion, Referencia=:Referencia, Departamento=:Departamento, Provincia=:Provincia, Distrito=:Distrito, Estado=:Estado WHERE idUsuario=:idUsuario");
		
		$stmt->bindParam(":CelularClie", $datos["Celular"], PDO::PARAM_STR);

		$stmt->bindParam(":Telefono", $datos["telefono"], PDO::PARAM_STR);
		
		$stmt->bindParam(":Direccion", $datos["direccion"], PDO::PARAM_STR);
		
		$stmt->bindParam(":Referencia", $datos["referencia"], PDO::PARAM_STR);
		
		$stmt->bindParam(":Departamento", $datos["Departamento"], PDO::PARAM_STR);
		
		$stmt->bindParam(":Provincia", $datos["Provincia"], PDO::PARAM_STR);
		
		$stmt->bindParam(":Distrito",$datos["Distrito"],PDO::PARAM_STR);
		
		$stmt->bindParam(":Estado",$datos["Estado"],PDO::PARAM_INT);
		
		$stmt->bindParam(":idUsuario",$datos["codUsuario"],PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
 }
}
