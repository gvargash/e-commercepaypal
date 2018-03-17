
<?php

/*=============================================
CREADOR DE IP
=============================================*/

//https://www.browserling.com/tools/random-ip

//$ip = $_SERVER['REMOTE_ADDR'];

$ip = "133.81.214.55";

//http://www.geoplugin.net/

$informacionPais = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);

$datosPais = json_decode($informacionPais);

$pais = $datosPais->geoplugin_countryName;
$codigo = $datosPais->geoplugin_countryCode;

$enviarIp = ControladorVisitas::ctrEnviarIp($ip, $pais, $codigo);

$totalVisitas = ControladorVisitas::ctrMostrarTotalVisitas();

?>

<!--=====================================
BREADCRUMB VISITAS
======================================-->
<div class="" style="margin-top: 90px; border-top: 1px solid #E932AF;border-bottom:1px solid #E932AF;">

	
		<div class="row center">

			<h6 style="color: #000; ">Tu eres nuestro visitante # <?php echo $totalVisitas["total"];?></h6>

		</div>
</div>

<!--=====================================
MÓDULO VISITAS
======================================-->

<div class="" style="margin-top: 30px;">
	
	<div class="">
		
		<div class="row">

		<?php

		$paises = ControladorVisitas::ctrMostrarPaises();

		$coloresPaises = array("#09F","#900","#059","#260","#F09","#02A");	

		$indice = -1;

		foreach($paises as $key => $value){

			$promedio = $value["cantidad"] * 100 / $totalVisitas["total"];

			$indice++;
	
			echo '<div class="col m2 s4 center">
				
					<h6 class="text-muted">'.$value["pais"].'</h6>

					<input type="text" class="knob" value="'.round($promedio).'" data-width="90" data-height="90" data-fgcolor="'.$coloresPaises[$indice].'" data-readonly="true">
 
					<p class="text-muted text-center" style="font-size:12px"> '.round($promedio).'% de las visitas</p>
	
				</div>';
		}


		?>

		</div>

	</div>

</div>