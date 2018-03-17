<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!--=====================================
		=            ESCRIPTA FACEBOOK PIXEL            =
		======================================-->
<?php $plantilla=ControladorPlantilla::ctrEstiloPlantilla(); 
		# Facebook Pixel Code 
		echo $plantilla["pixelFacebook"];
		# End Facebook Pixel Code 


		#api chat 
			echo $plantilla["apiChat"];
		# END REDES SOCIALES

		/*=============================================
		MANTENER LA RUTA FIJA DEL PROYECTO
		=============================================*/
		session_start();
		$servidor=Ruta::ctrRutaServidor();		

		echo '<link rel="icon" href="'.$servidor.$plantilla["icono"].'">';


		/*=============================================
		MANTENER LA RUTA FIJA DEL PROYECTO
		=============================================*/
		
		$url = Ruta::ctrRuta();

		/*=============================================
		MARCADO DE CABECERA
		=============================================*/

		$rutas = array();

		if(isset($_GET["ruta"])){

			$rutas = explode("/", $_GET["ruta"]);

			$ruta = $rutas[0];

		}
		else{

			$ruta = "inicio";

		}

		$cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);
		
		if(!$cabeceras["ruta"]){

			$ruta = "inicio";

			$cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);


		}
	?>

		<!--=====================================
	Marcado HTML5
	======================================-->

	<meta name="title" content="<?php echo  $cabeceras['titulo']; ?>">

	<meta name="description" content="<?php echo  $cabeceras['descripcion']; ?>">

	<meta name="keyword" content="<?php echo  $cabeceras['palabrasClaves']; ?>">

	<title><?php echo  $cabeceras['titulo']; ?></title>

	<!--=====================================
	Marcado de Open Graph FACEBOOK
	======================================-->

	<meta property="og:title"   content="<?php echo $cabeceras['titulo'];?>">
	<meta property="og:url" content="<?php echo $url.$cabeceras['ruta'];?>">
	<meta property="og:description" content="<?php echo $cabeceras['descripcion'];?>">
	<meta property="og:image"  content="<?php echo $url.$cabeceras['portada'];?>">
	<meta property="og:type"  content="website">	
	<meta property="og:site_name" content="Kayr3 | Print Intelligence">
	<meta property="og:locale" content="es_PE">

	<!--=====================================
	Marcado para DATOS ESTRUCTURADOS GOOGLE
	======================================-->
	
	<meta itemprop="name" content="<?php echo $cabeceras['titulo'];?>">
	<meta itemprop="url" content="<?php echo $url.$cabeceras['ruta'];?>">
	<meta itemprop="description" content="<?php echo $cabeceras['descripcion'];?>">
	<meta itemprop="image" content="<?php echo $url.$cabeceras['portada'];?>">

	<!--=====================================
	Marcado de TWITTER
	======================================-->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?php echo $cabeceras['titulo'];?>">
	<meta name="twitter:url" content="<?php echo $url.$cabeceras['ruta'];?>">
	<meta name="twitter:description" content="<?php echo $cabeceras['descripcion'];?>">
	<meta name="twitter:image" content="<?php echo $url.$cabeceras['portada'];?>">
	<meta name="twitter:site" content="@capzzula">


	<!--=====================================
	=            ESTILOS           =
	======================================-->	
	<link rel="stylesheet" href="<?php echo $url;?>vistas/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/kayre.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/normalize.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantillas.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/slide.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/productos.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/sweetalert.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/perfil.css">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/carrito-de-compras.css">
	<!-- compartir -->
	<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a13dea1bdd33b00115f6ed3&product=inline-share-buttons"></script>
    <script src="<?php echo $url; ?>vistas/js/sweetalert.min.js"></script>



</head>

<body>

<?php

/*=============================================
NAV
=============================================*/

include "modulos/nav.php";

/*=============================================
CONTENIDO DINÁMICO
=============================================*/
$rutas=array();
$ruta=null;
$infoProducto=null;
$detallePedido=null;

if(isset($_GET["ruta"])){

	$rutas=explode("/",$_GET['ruta']);

	$item="ruta";
	$valor=$rutas[0];


/*=============================================
URL´S AMIGABLES DE CATEGORIAS
=============================================*/
	$rutaCategorias=ControladorProductos::ctrMostrarCategorias($item,$valor);

	if($rutas[0]==$rutaCategorias["ruta"]){
		$ruta=$rutas[0];
	}

	/*=============================================
URL´S AMIGABLES DE MARCAS
=============================================*/
	$rutaMarcas=ControladorProductos::ctrMostrarMarcas($item,$valor);
		if ($rutas[0]==$rutaMarcas["ruta"]) {
			$ruta=$rutas[0];
		}
	
/*=============================================
URL´S AMIGABLES DE PRODUCTOS
=============================================*/
	$rutaProductos=ControladorProductos::ctrMostrarInfoProducto($item,$valor);
	if($rutas[0]==$rutaProductos["ruta"]){
		$infoProducto=$rutas[0];
	}


/*=============================================
URL´S AMIGABLES DE DETALLE PEDIDO
=============================================*/
	$rutaDetallePedido=ControladorPedidos::crtPedidoDetalle($item,$valor);
	if($rutas[0]==$rutaDetallePedido["ruta"]){
		$detallePedido=$rutas[0];
	}
	
/*=============================================
URL´S LISTA BLANCA DE CATEGORIA
=============================================*/

	if ($ruta!=null || $rutas[0]=="lo-mas-vendido" || $rutas[0]=="lo-mas-visto"){
		include "modulos/productos.php";
	}else if($infoProducto!=null){
		include "modulos/infoproducto.php";
	}else if($detallePedido!=null) {
		include "modulos/detalle-pedido.php";
	}else if($rutas[0]=="buscador" || $rutas[0] == "carrito-de-compras" || $rutas[0]=="Contactanos" || $rutas[0]=="Nosotros" || $rutas[0]=="verificar" || $rutas[0]=="salir" || $rutas[0]=="solicitud-nueva-contrasenia" || $rutas[0]=="perfil" || $rutas[0]=="error" || $rutas[0] == "finalizar-compra" || $rutas[0] == "direccion" || $rutas[0]=="detallebancarios"){
		include "modulos/".$rutas[0].".php";
	}else if($rutas[0]=="inicio"){
  		include"modulos/Slide.php";	
		include "modulos/destacados.php";
	}
	else{

		include "modulos/error404.php";
	}
}else{
	include"modulos/Slide.php";	
	include "modulos/destacados.php";
	include "modulos/visitas.php";
}


/*=============================================
URL´S AMIGABLES DE MARCAS
=============================================*/

/*=============================================
			FOOTER
=============================================*/

include "modulos/footer.php";
?>
<input type="hidden" value="<?php echo $url;?>" id="rutaOculta">


	<!--=====================================
	=            SCRIPTS         =
	======================================-->
	<script src="<?php echo $url; ?>vistas/js/jquery-3.2.1.js"></script>
    <script src="<?php echo $url; ?>vistas/js/materialize.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/kayre.js"></script>
    <script src="<?php echo $url; ?>vistas/js/app.js"></script>
    <script src="https://use.fontawesome.com/a618d3f11f.js"></script>
	<script src="<?php echo $url; ?>vistas/js/slide.js"></script>
	<script src="<?php echo $url; ?>vistas/js/jquery.scrollUp.js"></script>
		<script src="<?php echo $url; ?>vistas/js/knob.jquery.js"></script>
	<!--=====================================
		=            FACEBOOK LOGIN           =
		======================================-->
			
	<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1441229979260290',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.11'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


	<!--=====================================
=            GOOGLE ANALITIC            =
======================================-->
<?php echo $plantilla["googleAnalytics"]; ?>

<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
<script src="<?php echo $url; ?>vistas/js/jspersonalizados/buscador.js"></script>

<script src="<?php echo $url; ?>vistas/js/jspersonalizados/infoproducto.js"></script>
<script src="<?php echo $url; ?>vistas/js/jspersonalizados/carrito.js"></script>
<script src="<?php echo $url; ?>vistas/js/jspersonalizados/usuarios.js"></script>
<script src="<?php echo $url; ?>vistas/js/jspersonalizados/reegistroFacebook.js"></script>
<script src="<?php echo $url; ?>vistas/js/visitas.js"></script>
	<!--====  FIN SCRIPTS  ====-->
</body>
</html>