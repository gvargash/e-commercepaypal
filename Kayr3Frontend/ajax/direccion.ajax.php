<?php 
require_once "../controladores/direccion.controlador.php";
require_once "../modelos/modelo.direccion.php";

	class AjaxDireccion
{
	
	
	public $Celular;
	public $telefono;
	public $direccion;
	public $referencia;
	public $Departamento;
	public $Provincia;
	public $Distrito;
	public $Estado;
	public $codUsuario;

	public function AjaxUpdateDireccion()
		{
			$datos=array("Celular"=>$this->Celular,
						"telefono"=>$this->telefono,
						"direccion"=>$this->direccion,
						"referencia"=>$this->referencia,
						"Departamento"=>$this->Departamento,
						"Provincia"=>$this->Provincia,
						"Distrito"=>$this->Distrito,
						"Estado"=>$this->Estado,
						"codUsuario"=>$this->codUsuario
					);
			$respuesta=ControladorDireccion::ctrUpdateDireccion($datos);
			echo $respuesta;
		}
}

if (isset($_POST["codUsuario"])) {

	$Actualizar = new AjaxDireccion();

	$Actualizar -> Celular=$_POST["Celular"];
	$Actualizar -> telefono=$_POST["telefono"];
	$Actualizar -> direccion=$_POST["direccion"];
	$Actualizar -> referencia=$_POST["referencia"];
	$Actualizar -> Departamento=$_POST["Departamento"];
	$Actualizar -> Provincia=$_POST["Provincia"];
	$Actualizar -> Distrito=$_POST["Distrito"];
	$Actualizar -> Estado=$_POST["Estado"];
	$Actualizar-> codUsuario=$_POST["codUsuario"];
	$Actualizar->AjaxUpdateDireccion();
	
	}