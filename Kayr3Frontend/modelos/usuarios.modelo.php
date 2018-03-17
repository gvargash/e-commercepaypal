<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlRegistroUsuario($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(  
			    NombreUsu,ApellidoUsu,DNI,CorreoUsu,claveUsu,fotoUsu,EstadoUsu,idTipo,verificacion,modo,emailEncriptado)
		VALUES(:NombreUsu,:ApellidoUsu,:DNI,:CorreoUsu,:claveUsu,:fotoUsu,:EstadoUsu,:idTipo,:verificacion,:modo,:emailEncriptado)");

		$stmt->bindParam(":NombreUsu", $datos["NombreUsu"], PDO::PARAM_STR);
		$stmt->bindParam(":ApellidoUsu", $datos["ApellidoUsu"], PDO::PARAM_STR);
		$stmt->bindParam(":DNI", $datos["DNI"], PDO::PARAM_STR);
		$stmt->bindParam(":CorreoUsu", $datos["CorreoUsu"], PDO::PARAM_STR);
		$stmt->bindParam(":claveUsu", $datos["claveUsu"], PDO::PARAM_STR);
		$stmt->bindParam(":fotoUsu", $datos["fotoUsu"], PDO::PARAM_STR);
		$stmt->bindParam(":EstadoUsu",$datos["EstadoUsu"],PDO::PARAM_INT);
		$stmt->bindParam(":idTipo",$datos["idTipo"],PDO::PARAM_STR);
		$stmt->bindParam(":verificacion",$datos["verificacion"],PDO::PARAM_INT);
		$stmt->bindParam(":modo",$datos["modo"],PDO::PARAM_STR);
		$stmt->bindParam(":emailEncriptado", $datos["emailEncriptado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	 			MOSTRAR USUARIO
	=============================================*/
	
	static public function mdlMostrarUsuario($tabla,$item,$valor)
	{
		$stmt=Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE $item=:$item");
		$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt=null;
	}
	/*=============================================
	=            ACTUALIZAR USUARIO           =
	=============================================*/
	
	static public function mdlActualizarUsuario($tabla,$idUsuario,$item,$valor)
	{
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET $item=:$item WHERE idUsuario=:idUsuario");
		$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
		$stmt->bindParam(":idUsuario",$idUsuario,PDO::PARAM_STR);
		
		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}
		
		$stmt->close();
		$stmt=null;
	}
	/*=============================================
		=            ACTUALIZAR PERFIL           =
		=============================================*/
	static public function mdlActualizarPerfil($tabla,$datos)
	{
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET NombreUsu=:NombreUsu,ApellidoUsu=:ApellidoUsu,DNI=:DNI,CorreoUsu=:CorreoUsu,claveUsu=:claveUsu,fotoUsu=:fotoUsu WHERE idUsuario=:idUsuario");
			$stmt->bindParam(":NombreUsu",$datos["NombreUsu"],PDO::PARAM_STR);
			$stmt->bindParam(":ApellidoUsu",$datos["ApellidoUsu"],PDO::PARAM_STR);
			$stmt->bindParam(":DNI",$datos["DNI"],PDO::PARAM_STR);
			$stmt->bindParam(":CorreoUsu",$datos["CorreoUsu"],PDO::PARAM_STR);
			$stmt->bindParam(":claveUsu",$datos["claveUsu"],PDO::PARAM_STR);
			$stmt->bindParam(":fotoUsu",$datos["fotoUsu"],PDO::PARAM_STR);
			$stmt->bindParam(":idUsuario",$datos["idUsuario"],PDO::PARAM_STR);
			
			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			
			$stmt->close();
			$stmt=null;
	}

	/*=============================================
	 			MOSTRAR COMPRAS
	=============================================*/
	
	static public function mdlMostrarCompras($tabla,$item,$valor)
	{
		$stmt=Conexion::conectar()->prepare("SELECT p.NumeroPedido,p.FechaPedido,p.envio,u.CorreoUsu,p.total,p.ruta FROM $tabla p inner join usuario u on p.idUsuario=u.idUsuario WHERE u.$item=:$item ORDER BY 
				idPedido DESC");
		$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt=null;
	}



	/*=============================================
	AGREGAR A LISTA DE DESEOS
	=============================================*/

	static public function mdlAgregarDeseo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idUsuario, idProducto) VALUES (:idUsuario, :idProducto)");

		$stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);
		$stmt->bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);	

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR LISTA DE DESEOS
	=============================================*/

	static public function mdlMostrarDeseos($tabla, $item){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idUsuario = :idUsuario ORDER BY id DESC");

		$stmt -> bindParam(":idUsuario", $item, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
/*=============================================
	QUITAR PRODUCTO DE LISTA DE DESEOS
	=============================================*/

	static public function mdlQuitarDeseo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}


	/*=============================================
	ELIMINAR USUARIO
	=============================================*/

	static public function mdlEliminarUsuario($tabla, $idUsuario){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario = :idUsuario");

		$stmt -> bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	ELIMINAR COMPRAS DE USUARIO
	=============================================*/

	static public function mdlEliminarCompras($tabla, $idUsuario){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario = :idUsuario");

		$stmt -> bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}


		/*=============================================
	ELIMINAR LISTA DE DESEOS DE USUARIO
	=============================================*/

	static public function mdlEliminarListaDeseos($tabla, $idUsuario){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario = :idUsuario");

		$stmt -> bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}




	static public function mdlDireccionDeentrega($tabla){

	  $stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE idUsuario = :idUsuario");

		$stmt -> bindParam(":idUsuario",$_SESSION["idUsuario"], PDO::PARAM_INT);

		$stmt->execute();
		
		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;
	}
}