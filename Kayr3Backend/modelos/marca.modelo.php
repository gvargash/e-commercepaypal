<?php 

require_once "conexion.php";

class ModeloMarcas
{
	
	static public function mdlListarMarcas($tabla){

		$stmt=Conexion::conectar()->prepare("SELECT NameMarca,ruta,idMarca FROM $tabla");

		$stmt->execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}



	/*=============================================
	MOSTRAR Marca
	=============================================*/


	static public function mdlMostraMarca($tabla,$item,$valor){

		$stmt=Conexion::conectar()->prepare("SELECT NameMarca,ruta,idMarca FROM $tabla WHERE $item=:$item");

		$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);

		$stmt->execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}


	static public function mdlEliminarMarca($tabla,$datos){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idMarca=:idMarca");

		$stmt->bindParam(":idMarca",$datos["codMarca"],PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR Marca
	=============================================*/

	static public function mdlActualizarMarca($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NameMarca=:NameMarca,ruta=:ruta WHERE idMarca=:idMarca");

		$stmt->bindParam(":NameMarca", $datos["NameMarca"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":idMarca",$datos["idMarca"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	


	/*=============================================
	AGREGAR MARCA
	=============================================*/

	static public function mdlAgregarMarca($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NameMarca, ruta, ofertadoPorCategoria, Estado, oferta, precioOferta, descuentoOferta, imgOferta, finOferta,fecha) 
			VALUES(:NameMarca,:ruta,:ofertadoPorCategoria,:Estado,:oferta,:precioOferta,:descuentoOferta,:imgOferta,:finOferta,:fecha)");

		$stmt->bindParam(":NameMarca", $datos["NameMarca"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":Estado",$datos["Estado"], PDO::PARAM_INT);		
		$stmt->bindParam(":ofertadoPorCategoria", $datos["ofertadoPorCategoria"], PDO::PARAM_STR);
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