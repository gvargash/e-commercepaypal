<?php 

require_once "conexion.php";

class ModeloCategoria
{
	
	static public function mdlListarCategoria($tabla){

		$stmt=Conexion::conectar()->prepare("SELECT NameCategoria,ruta,Descripcion,idCategoria FROM $tabla");

		$stmt->execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

/*=============================================
	MOSTRAR CATEGORIA
	=============================================*/


	static public function mdlMostraCategoria($tabla,$item,$valor){

		$stmt=Conexion::conectar()->prepare("SELECT NameCategoria,ruta,Descripcion,idCategoria FROM $tabla WHERE $item=:$item");

		$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);

		$stmt->execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}


	static public function mdlEliminarCategoria($tabla,$datos){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCategoria=:idCategoria");

		$stmt->bindParam(":idCategoria",$datos["codCategoria"],PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR CATEGORIA
	=============================================*/

	static public function mdlActualizarCategoria($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NameCategoria = :NameCategoria, Descripcion = :Descripcion, ruta = :ruta WHERE idCategoria = :idCategoria");

		$stmt->bindParam(":NameCategoria", $datos["NameCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":idCategoria",$datos["idCategoria"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	


	/*=============================================
	AGREGAR CATEGORIA
	=============================================*/

	static public function mdlAgregarCategoria($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NameCategoria, ruta, Descripcion, Estado, oferta, precioOferta, descuentoOferta, imgOferta, finOferta,fecha) 
			VALUES(:NameCategoria,:ruta,:Descripcion,:Estado,:oferta,:precioOferta,:descuentoOferta,:imgOferta,:finOferta,:fecha)");

		$stmt->bindParam(":NameCategoria", $datos["NameCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":Estado",$datos["Estado"], PDO::PARAM_INT);
		$stmt->bindParam(":oferta", $datos["oferta"], PDO::PARAM_INT);
		$stmt->bindParam(":precioOferta", $datos["precioOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoOferta", $datos["descuentoOferta"], PDO::PARAM_INT);
		$stmt->bindParam(":imgOferta",$datos["imgOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":finOferta", $datos["finOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
}