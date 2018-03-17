<?php 
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
class AjaxUsuarios{

	/*=============================================
	VALIDAR EMAIL EXISTENTE
	=============================================*/	

	public $validarEmail;

	public function ajaxValidarEmail(){

		$datos = $this->validarEmail;

		$respuesta = ControladorUsuarios::ctrMostrarUsuario("CorreoUsu", $datos);

		echo json_encode($respuesta);

	}

		/*=============================================
		REGISTRO CON FACEBOOK
		=============================================*/	
		public $email;
		public $nombre;
		public $foto;
		public function ajaxRegistroFacebook()
		{
			$datos=array("NombreUsu"=>$this->nombre,
						"ApellidoUsu"=>"",
						"DNI"=>"null",
						"CorreoUsu"=>$this->email,
						"claveUsu"=>"null",
						"fotoUsu"=>$this->foto,
						"EstadoUsu"=>1,
						"idTipo"=>"UKA02",
						"verificacion"=>0,
						"modo"=>"facebook",
						"emailEncriptado"=>"null");
			$respuesta=ControladorUsuarios::ctrRegistroRedesSociales($datos);
			echo $respuesta;
		}

			public $idUsuario;
			public $idProducto;

			public function ajaxAgregarDeseo(){

				$datos = array("idUsuario"=>$this->idUsuario,
							   "idProducto"=>$this->idProducto);

				$respuesta = ControladorUsuarios::ctrAgregarDeseo($datos);

				echo $respuesta;

	}

	/*=============================================
	QUITAR PRODUCTO DE LISTA DE DESEOS
	=============================================*/

	public $idDeseo;	

	public function ajaxQuitarDeseo(){

		$datos = $this->idDeseo;

		$respuesta = ControladorUsuarios::ctrQuitarDeseo($datos);

		echo $respuesta;

	}




}
/*=============================================
VALIDAR EMAIL EXISTENTE
=============================================*/	

if(isset($_POST["validarEmail"])){

	$valEmail = new AjaxUsuarios();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();

}

/*=============================================
		REGISTRO CON FACEBOOk
=============================================*/	
if(isset($_POST["email"])){

	$regFacebook = new AjaxUsuarios();
	$regFacebook -> email = $_POST["email"];
	$regFacebook -> nombre = $_POST["nombre"];
	$regFacebook -> foto = $_POST["foto"];

	$regFacebook -> ajaxRegistroFacebook();

}

/*=============================================
AGREGAR A LISTA DE DESEOS
=============================================*/	

if(isset($_POST["idUsuario"])){

	$deseo = new AjaxUsuarios();
	$deseo -> idUsuario = $_POST["idUsuario"];
	$deseo -> idProducto = $_POST["idProducto"];
	$deseo ->ajaxAgregarDeseo();
}


/*=============================================
QUITAR PRODUCTO DE LISTA DE DESEOS
=============================================*/

if(isset($_POST["idDeseo"])){

	$quitarDeseo = new AjaxUsuarios();
	$quitarDeseo -> idDeseo = $_POST["idDeseo"];
	$quitarDeseo ->ajaxQuitarDeseo();
}