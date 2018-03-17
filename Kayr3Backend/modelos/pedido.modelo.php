<?php

require_once "conexion.php";

class ModeloVentas{

	/*=============================================
	MOSTRAR LISTA
	=============================================*/	

	static public function mdlListarPedidos($tabla,$item){

		$stmt=Conexion::conectar()->prepare("SELECT p.idPedido,p.NumeroPedido,p.FechaPedido,p.envio,CONCAT(u.NombreUsu, u.ApellidoUsu) as cliente,p.total,
			p.ruta FROM pedido p inner join usuario  u on p.idUsuario=u.idUsuario ORDER BY $item");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt=null;
	}

	/*=============================================
	MOSTRAR EL TOTAL DE VENTAS
	=============================================*/	

	static public function mdlMostrarTotalVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(SubTotal) as total FROM $tabla WHERE envio=3");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/	

	static public function mdlMostrarVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE envio=3");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


/*=============================================
	MOSTRAR DETALLE PEDIDO
	=============================================*/

	static public function mdlDetallePedido($item,$valor){
				$stmt = Conexion::conectar()->prepare("SELECT idPedido,ruta,NumeroPedido,FechaPedido,SubTotal,CostoEnvio,IGV,total,di.*,CONCAT(u.NombreUsu,' ', u.ApellidoUsu) as Cliente, u.CorreoUsu FROM pedido p INNER JOIN usuario u
				on p.idUsuario=u.idUsuario INNER JOIN direcciondeentrega di on
				di.idUsuario=u.idUsuario where $item=:$item");
		
					$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

					$stmt->execute();

					return $stmt -> fetch();
			$stmt->close();
			$stmt=null; 
	}

	/*=============================================
	MOSTRAR DETALLE PEDIDO secundario
	=============================================*/
    static public function mdlDetallePedidoSecundario($valor){

    	$stmt=Conexion::conectar()->prepare("CALL detallePedido(?)");

    	$stmt->bindParam(1,$valor);
		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();
		$stmt=null;
    }


	/*=============================================
	MOSTRAR datos bancarios
	=============================================*/
	public function mdlDatosBancarios(){
		$stmt=Conexion::conectar()->prepare("SELECT Banco,NumeroDeCuenta,PropietarioCU FROM comercio");

		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();
		$stmt=null;
	}



	static public function mdlAceptarPedido($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET envio=:envio WHERE idPedido=:idPedido");

		$stmt->bindParam(":envio", $datos["envio"], PDO::PARAM_INT);
		$stmt->bindParam(":idPedido",$datos["idPedido"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlAnulaPedido($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET envio=:envio WHERE idPedido=:idPedido");

		$stmt->bindParam(":envio", $datos["envio"], PDO::PARAM_INT);
		$stmt->bindParam(":idPedido",$datos["idPedido"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}


	static public function mdlCompletarPedido($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET envio=:envio WHERE idPedido=:idPedido");

		$stmt->bindParam(":envio", $datos["envio"], PDO::PARAM_INT);
		$stmt->bindParam(":idPedido",$datos["idPedido"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}
}