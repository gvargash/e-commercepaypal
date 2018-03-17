<?php 
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{
	/*=============================================
	ACTUALIZAR CATEGORIA
	=============================================*/	

	public $NameCategoria;
	public $Descripcion;
	public $ruta;

	public $idCategoria;

	public function ajaxActualizarCategoria(){

		$datos = array("NameCategoria"=>$this->NameCategoria,
						"Descripcion"=>$this->Descripcion,
					    "ruta"=>$this->ruta,
					    "idCategoria"=>$this->idCategoria);

		$respuesta = ControladorCategoria::ctrActualizarCategoria($datos);

		echo $respuesta;

	}



	public function ajaxAgregarCategoria(){

		$datos = array("NameCategoria"=>$this->NameCategoria,
						"Descripcion"=>$this->Descripcion,
					    "ruta"=>$this->ruta,
					    "Estado"=>$this->Estado,
						"oferta"=>$this->oferta,
						"precioOferta"=>$this->precioOferta,
						"descuentoOferta"=>$this->descuentoOferta,
						"imgOferta"=>$this->imgOferta,
						"finOferta"=>$this->finOferta,
						"fecha"=>$this->fecha);

		$respuesta = ControladorCategoria::ctrAgregarCategoria($datos);

		echo $respuesta;

	}



		/*=============================================
	ELIMINAR CATEGORIA 
	=============================================*/

	public $codCategoria;

	public function ajaxEliminarCategoria(){

		$datos =array("codCategoria" =>$this->codCategoria);

		$respuesta = ControladorCategoria::ctrEliminaCategoria($datos);

		echo $respuesta;

	}
}

/*=============================================
ACTUALIZAR CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$categorias = new AjaxCategorias();
	$categorias -> NameCategoria = $_POST["NameCategoria"];
	$categorias -> ruta = $_POST["ruta"];
	$categorias -> Descripcion=$_POST["Descripcion"];
	$categorias -> idCategoria=$_POST["idCategoria"];
	$categorias -> ajaxActualizarCategoria();

}
/*=============================================
ADD CATEGORIA
=============================================*/	

if(isset($_POST["NameCategoria"])){

	$categoriasadd = new AjaxCategorias();
	$categoriasadd -> NameCategoria = $_POST["NameCategoria"];
	$categoriasadd -> ruta = $_POST["ruta"];
	$categoriasadd -> Descripcion=$_POST["Descripcion"];
	$categoriasadd -> Estado =$_POST["Estado"];
	$categoriasadd -> oferta =$_POST["oferta"];
	$categoriasadd -> precioOferta=$_POST["precioOferta"];
	$categoriasadd -> descuentoOferta=$_POST["descuentoOferta"];
	$categoriasadd -> imgOferta=$_POST["imgOferta"];
	$categoriasadd -> finOferta=$_POST["finOferta"];
	$categoriasadd -> fecha=$_POST["fecha"];
	$categoriasadd -> ajaxAgregarCategoria();

}


/*=============================================
ELIMINAR CATEGORIA
=============================================*/

if(isset($_POST["codCategoria"])){
	$eliminarCat = new AjaxCategorias();
	$eliminarCat -> codCategoria = $_POST["codCategoria"];
	$eliminarCat ->ajaxEliminarCategoria();
}