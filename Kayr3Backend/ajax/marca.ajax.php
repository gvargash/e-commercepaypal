<?php 
require_once "../controladores/marca.controlador.php";
require_once "../modelos/marca.modelo.php";

class AjaxMarcas{

public $NameMarca;
public $ruta;
public $Estado;
public $precioOferta;
public $descuentoOferta;
public $imgOferta;
public $finOferta;
public $fecha;

public $idMarca;
	/*=============================================
ADD MARCA
=============================================*/	
	public function ajaxAgregarMarcas(){

		$datos = array("NameMarca"=>$this->NameMarca,
					    "ruta"=>$this->ruta,
					    "Estado"=>$this->Estado,				    
						"ofertadoPorCategoria"=>$this->ofertadoPorCategoria,
						"oferta"=>$this->oferta,
						"precioOferta"=>$this->precioOferta,
						"descuentoOferta"=>$this->descuentoOferta,
						"imgOferta"=>$this->imgOferta,
						"finOferta"=>$this->finOferta,
						"fecha"=>$this->fecha);

		$respuesta = ControladorMarca::ctrAgregarMarca($datos);

		echo $respuesta;

	}

	/*=============================================
UPDATE MARCA
=============================================*/	


public function ajaxActualizarMarcas(){

		$datos = array("NameMarca"=>$this->NameMarca,
					    "ruta"=>$this->ruta,
						"idMarca"=>$this->idMarca);

		$respuesta = ControladorMarca::ctrActualizarMarca($datos);

		echo $respuesta;

	}



/*=============================================
DELETE MARCA
=============================================*/	
public $codMarca;

public function ajaxEliminarMarcas(){

		$datos = array("codMarca"=>$this->codMarca);

		$respuesta = ControladorMarca::ctrEliminarMarca($datos);

		echo $respuesta;

	}
	
}



/*=============================================
ADD MARCA
=============================================*/	

if(isset($_POST["NameMarca"])){

	$marcasadd = new AjaxMarcas();
	$marcasadd -> NameMarca = $_POST["NameMarca"];
	$marcasadd -> ruta = $_POST["ruta"];
	$marcasadd -> Estado =$_POST["Estado"];	
	$marcasadd -> ofertadoPorCategoria=$_POST["ofertadoPorCategoria"];
	$marcasadd -> oferta =$_POST["oferta"];
	$marcasadd -> precioOferta=$_POST["precioOferta"];
	$marcasadd -> descuentoOferta=$_POST["descuentoOferta"];
	$marcasadd -> imgOferta=$_POST["imgOferta"];
	$marcasadd -> finOferta=$_POST["finOferta"];
	$marcasadd -> fecha=$_POST["fecha"];
	$marcasadd -> ajaxAgregarMarcas();

}
/*=============================================
UPDATE MARCA
=============================================*/	

if(isset($_POST["idMarca"])){

	$marcasupdate = new AjaxMarcas();
	$marcasupdate -> NameMarca = $_POST["NameMarca"];
	$marcasupdate -> ruta = $_POST["ruta"];
	$marcasupdate -> idMarca = $_POST["idMarca"];
	$marcasupdate -> ajaxActualizarMarcas();

}


/*=============================================
DELETE MARCA
=============================================*/	

if(isset($_POST["codMarca"])){

	$marcasdelete = new AjaxMarcas();
	$marcasdelete -> codMarca = $_POST["codMarca"];
	$marcasdelete -> ajaxEliminarMarcas();

}