<?php 
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];


$piezas=explode(",",$nombre);
$pieza2=explode(",",$dni);


for ($i=0; $i < sizeof($piezas); $i++) { 
	echo  "INSERT INTO (nombre,apellido,dni)
		VALUES($piezas[$i],$apellido,$pieza2[$i])".'<BR>';
}