<?php 
require_once "conexion.php";
class ModeloCarrito
{
	
	/*=============================================
		MOSTRAR TARIFAS
	=============================================*/	
	static public function mdlMostrarTarifas($tabla)
	{
		$stmt=Conexion::conectar()->prepare("SELECT*FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt->close();
	}


	/*=============================================
	NUEVAS COMPRAS
	=============================================*/
	static public function mdlNuevasCompras($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idUsuario,idProducto,envio,metodo, email, direccion, pais)
		 VALUES (:idUsuario, :idProducto,:envio, :metodo, :email, :direccion, :pais)");

		$stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);
		$stmt->bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);
		$stmt->bindParam(":envio", $datos["envio"], PDO::PARAM_INT);
		$stmt->bindParam(":metodo", $datos["metodo"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":pais", $datos["pais"], PDO::PARAM_STR);

		if($stmt->execute()){ 

			return "ok"; 

		}else{ 

			return "error"; 

		}

		$stmt->close();

		$tmt =null;
	}
}