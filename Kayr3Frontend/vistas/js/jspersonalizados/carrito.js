
/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
VISUALIZAR LA CESTA DEL CARRITO DE COMPRAS
=============================================*/

if(localStorage.getItem("cantidadCesta") != null){

	$(".cantidadCesta").html(localStorage.getItem("cantidadCesta"));
	

}else{

	$(".cantidadCesta").html("0");

}


/*=============================================
 /*=============================================
 /*=============================================
 /*=============================================
 /*=============================================
 VISUALIZAR LOS PRODUCTOS EN LA PÁGINA CARRITO DE COMPRAS
 =============================================*/
 







if (localStorage.getItem("listaProductos") != null) {

    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
    listaCarrito.forEach(funcionForEach);
$(".contenedor-basio").hide();
    function funcionForEach(item, index) {
        $('.cuerpoCarrito').append(
                    '<div class="row center-align itemCarrito center">'

                            +'<div class="col l2 m2 s12 center">'
                                +'<button class="waves-light pink darken-4 quitarItemCarrito" idProducto="'+item.idProducto+'" peso="'+item.peso+'">'
                                    +'<i class="fa fa-times">'
                                        + '</i>'
                                    +'</button>'
                                +'</div>'

                            +'<div class="col s2  m2 l2 center offset-s5">'
                                +'<img src="'+item.imagen+'" class="materialboxed" width="50" height="50" style="border:1px solid #cccccc; border-radius:5px;">'
                            + '</div>'

                            +'<div class="col l2 m2 s12">'
                                +'<p class="tituloCarritoCompra">'+item.NombreProducto+'</p>'
                                +'</div>'

                            + '<div class="col l2 m2 s12">'+
                                '<p class="precioCarritoCompra text-center"> S/ <span>'+item.PrecioKayre+'</span></p>'
                                +'</div>'
                            + '<div class="col l2 m2 s12">'
                                + '<input id="txtcantidad" class="cantidadItem" min="1" max="10" type="number" name=""  value="'+item.Cantidad+'" tipo="fisico" PrecioKayre="'+item.PrecioKayre+'" idProducto="'+item.idProducto+'">'+
                                '</div>'
                            + '<div class="col l2 m2 s12 center">'
                                +'<p class="subTotal'+item.idProducto+' subtotales">'+
                                     '<strong> S/ <span>'+item.PrecioKayre+'</span></strong>'
                                 +'</p>'
                            +'</div>'+
                            '</div>'+'<div class="divider"></div>');
      
    }


} else {
    $(".contenedor-basio").show();
    $(".sumaCarrito").hide();
    $(".cabeceraCarrito").hide();
}


/*=============================================
 /*=============================================
 /*=============================================
 /*=============================================
 /*=============================================
 AGREGAR AL CARRITO
 =============================================*/
$(".agregarCarrito").click(function ()
{

    var idProducto = $(this).attr("idProducto");
    var NombreProducto = $(this).attr("NombreProducto");
    var imagen = $(this).attr("imagen");
    var PrecioKayre = $(this).attr("PrecioKayre");
    var peso=$(this).attr("peso");

    var agregarAlCarrito = true;



    



    /*=============================================
     ALMACENAR EN EL LOCALSTARGE LOS PRODUCTOS AGREGADOS AL CARRITO
     =============================================*/
 

    if (agregarAlCarrito) {

        /*=============================================
         RECUPERAR ALMACENAMIENTO DEL LOCALSTORAGE
         =============================================*/
        if (localStorage.getItem("listaProductos") == null) {

            listaCarrito = [];

        } else {

            listaCarrito.concat(localStorage.getItem("listaProductos"));

        }

        listaCarrito.push({"idProducto": idProducto,
            "imagen": imagen,
            "NombreProducto": NombreProducto,
            "PrecioKayre": PrecioKayre,
            "Cantidad": "1",
            "peso":peso});

        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

        /*=============================================
         ACTUALIZAR LA CESTA
         =============================================*/


		var cantidadCesta = Number($(".cantidadCesta").html()) + 1;

		$(".cantidadCesta").html(cantidadCesta);


		localStorage.setItem("cantidadCesta", cantidadCesta);


        /*=============================================
         MOSTRAR ALERTA DE QUE EL PRODUCTO YA FUE AGREGADO
         =============================================*/
        swal({
            title: "",
            text: "¡Se ha agregado un nuevo producto al carrito de compras!",
            type: "success",
            showCancelButton: true,
            confirmButtonColor: "#C407C6",
            cancelButtonText: "¡Continuar comprando!",
            cancelButtonColor:"#47D951",
            confirmButtonText: "¡Ir a mi carrito de compras!",
            closeOnConfirm: false
        },
                function (isConfirm) {
                    if (isConfirm) {
                        window.location = rutaOculta+"carrito-de-compras";
                    }
                });

    }



});


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
QUITAR PRODUCTOS DEL CARRITO
=============================================*/

$(".quitarItemCarrito").click(function(){

	$(this).parent().parent().remove();

	var idProducto = $(".cuerpoCarrito button");
	var imagen = $(".cuerpoCarrito img");
	var nombreporuducto = $(".cuerpoCarrito .tituloCarritoCompra");
	var precioKayre = $(".cuerpoCarrito .precioCarritoCompra span");
	var cantidad = $(".cuerpoCarrito .cantidadItem");



	/*=============================================
	SI AÚN QUEDAN PRODUCTOS VOLVERLOS AGREGAR AL CARRITO (LOCALSTORAGE)
	=============================================*/

	listaCarrito = [];

	if(idProducto.length != 0){

		for(var i = 0; i < idProducto.length; i++){

			var idProductoArray = $(idProducto[i]).attr("idProducto");
            var pesoArray = $(idProducto[i]).attr("peso");
			var imagenArray = $(imagen[i]).attr("src");
			var NombreProductoArray = $(nombreporuducto[i]).html();
			var PrecioKayreArray = $(precioKayre[i]).html();
			var CantidadArray = $(cantidad[i]).val();

			listaCarrito.push({"idProducto":idProductoArray,
                            "peso":pesoArray,
						   "imagen":imagenArray,
						   "NombreProducto":NombreProductoArray,
						   "PrecioKayre":PrecioKayreArray,
				           "Cantidad":CantidadArray});

		}

		localStorage.setItem("listaProductos",JSON.stringify(listaCarrito));

        sumaSubtotales();
        cestaCarrito(listaCarrito.length);
	
    }else{

		/*=============================================
		SI YA NO QUEDAN PRODUCTOS HAY QUE REMOVER TODO
		=============================================*/	

		localStorage.removeItem("listaProductos");

		localStorage.setItem("cantidadCesta","0");

        $(".cantidadCesta").html("0");
        $(".contenedor-carrito").hide();
		$(".sumaCarrito").hide();
		$(".contenedor-basio").show();

	}

});


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
GENERAR SUBTOTAL DESPUES DE CAMBIAR CANTIDAD
=============================================*/
$(".cantidadItem").change(function(){

    var cantidad = $(this).val();
    var PrecioKayre = $(this).attr("PrecioKayre");
    var idProducto = $(this).attr("idProducto");

    $(".subTotal"+idProducto).html('<strong> S/ <span>'+(cantidad*PrecioKayre)+'</span></strong>');

    /*=============================================
    ACTUALIZAR LA CANTIDAD EN EL LOCALSTORAGE
    =============================================*/

    var idProducto = $(".cuerpoCarrito button");
    var imagen = $(".cuerpoCarrito img");
    var nombreProducto= $(".cuerpoCarrito .tituloCarritoCompra");
    var precioKayre = $(".cuerpoCarrito .precioCarritoCompra span");
    var cantidad = $(".cuerpoCarrito .cantidadItem");

    listaCarrito = [];

    for(var i = 0; i < idProducto.length; i++){

            var idProductoArray = $(idProducto[i]).attr("idProducto");
            var imagenArray = $(imagen[i]).attr("src");
            var NombreProductoArray = $(nombreProducto[i]).html();
            var PrecioKayreArray = $(precioKayre[i]).html();
            var cantidadArray = $(cantidad[i]).val();
            var pesoArray = $(idProducto[i]).attr("peso");


            listaCarrito.push({"idProducto":idProductoArray,
                           "imagen":imagenArray,
                           "NombreProducto":NombreProductoArray,
                           "PrecioKayre":PrecioKayreArray,
                           "peso":pesoArray,
                           "Cantidad":cantidadArray});

        }

        localStorage.setItem("listaProductos",JSON.stringify(listaCarrito));

        sumaSubtotales();
        cestaCarrito(listaCarrito.length);
});


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
ACTUALIZAR SUBTOTAL
=============================================*/
var precioCarritoCompra = $(".cuerpoCarrito .precioCarritoCompra span");
var cantidadItem = $(".cuerpoCarrito .cantidadItem");

for(var i = 0; i < precioCarritoCompra.length; i++){

    var precioCarritoCompraArray = $(precioCarritoCompra[i]).html();
    var cantidadItemArray = $(cantidadItem[i]).val();
    var idProductoArray = $(cantidadItem[i]).attr("idProducto");

    $(".subTotal"+idProductoArray).html('<strong> S/  <span>'+(precioCarritoCompraArray*cantidadItemArray)+'</span></strong>')
    sumaSubtotales();
    cestaCarrito(listaCarrito.length);

}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
SUMA DE TODOS LOS SUBTOTALES
=============================================*/
function sumaSubtotales(){

    var subtotales = $(".subtotales span");
    var arraySumaSubtotales = [];
    
    for(var i = 0; i < subtotales.length; i++){

        var subtotalesArray = $(subtotales[i]).html();
        arraySumaSubtotales.push(Number(subtotalesArray));
        
    }

    
    function sumaArraySubtotales(total, numero){

        return total + numero;

    }

    var sumaTotal = arraySumaSubtotales.reduce(sumaArraySubtotales);
    var resultado=sumaTotal.toFixed(2);
    $(".sumaSubTotal").html('<strong> S/ <span>'+resultado+'</span></strong>');


}


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
ACTUALIZAR CESTA AL CAMBIAR CANTIDAD
=============================================*/
function cestaCarrito(cantidadProductos){

    /*=============================================
    SI HAY PRODUCTOS EN EL CARRITO
    =============================================*/

    if(cantidadProductos != 0){
        
        var cantidadItem = $(".cuerpoCarrito .cantidadItem");

        var arraySumaCantidades = [];
    
        for(var i = 0; i < cantidadItem .length; i++){

            var cantidadItemArray = $(cantidadItem[i]).val();
            arraySumaCantidades.push(Number(cantidadItemArray));
            
        }
    
        function sumaArrayCantidades(total, numero){

            return total + numero;

        }

        var sumaTotalCantidades = arraySumaCantidades.reduce(sumaArrayCantidades);
        $(".cantidadCesta").html(sumaTotalCantidades);
        localStorage.setItem("cantidadCesta", sumaTotalCantidades);

    }

}
/*=============================================
/*=============================================
/*=============================================
/*=============================================
fecha actual
/*=============================================
*/
var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day);
    $('.pedidoFecha').val(today);
/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
CHECKOUT
=============================================*/
$("#btnCheckout").click(function()
{
    $(".listaProductos table.tablaProductos tbody").html("");

    var idProducto=$(".cuerpoCarrito button");
    var idUsuario = $(this).attr("idUsuario");
    var peso = $(".cuerpoCarrito button");
    var nombreporuducto = $(".cuerpoCarrito .tituloCarritoCompra");
    var cantidad = $(".cuerpoCarrito .cantidadItem");
    var subtotal=$(".cuerpoCarrito .subtotales span");
    var tipoArray=[];
    var cantidadPeso=[];
    var sumaSubTotal=$(".sumaSubTotal span");
    var precioKayre = $(".cuerpoCarrito .precioCarritoCompra span");

        /*=============================================
         SUMA SUBTOTAL
        =============================================*/

         $(".valorSubtotal").html($(sumaSubTotal).html());

         $(".valorSubtotal").attr("valor",$(sumaSubTotal).html());
     /*=============================================
         TASA DE IMPUESTO
        =============================================*/
        var impuestoTotal=($(".valorSubtotal").html()* $("#tasaImpuesto").val())/100;
        $(".valorTotalImpuesto").html(impuestoTotal.toFixed(2));
        $(".valorTotalImpuesto").attr("valor",impuestoTotal.toFixed(2));
        

        sumaTotalEnvio();
        /*=============================================
         VARIABLES ARRAY
        =============================================*/
    for (var i = 0; i < nombreporuducto.length; i++) {
        var idProductoArray=$(idProducto[i]).attr("idProducto");
        var pesoArray=$(peso[i]).attr("peso");
        var nombreporuductoArray=$(nombreporuducto[i]).html();
        var PrecioKayreArray=$(precioKayre[i]).html();
        var cantidadArray=$(cantidad[i]).val();
        var subtotalArray=$(subtotal[i]).html();

        /*=============================================
        EVALUAR EL PESO DE ACUERDO A LA CANTIDAD DE PRODUCTOS
        =============================================*/
        cantidadPeso[i]= pesoArray * cantidadArray;

        function sumaArrayPeso(total,numero)
        {
            return total+numero;
        }

        var sumaTotalPeso=cantidadPeso.reduce(sumaArrayPeso);

        /*=============================================
        MOSTRAR PRODUCTO DEFINITIVOS A COMPRAR
        =============================================*/

        $(".listaProductos table.tablaProductos tbody").append('<tr>'+
                                                                    '<td class="valorTitulo">'+nombreporuductoArray+'<input type="hidden" name="idproductode[]"  value="'+idProductoArray+'" readonly></td>'+
                                                                    '<td class="valorCantidad">'+cantidadArray+'<input type="hidden" name="cantidadde[]"  value="'+cantidadArray+'" readonly></td>'+
                                                                    '<td><span class="simboloDivisa">S/ </span>'+
                                                                        '<span class="valorItem" valor="'+subtotalArray+'">'+subtotalArray+'</span><input type="hidden" name="preciode[]"  value="'+PrecioKayreArray+'" readonly></td>'+
                                                               '</tr>');
    }





    var total = $(".valorTotalCompra").html();
 
    var impuesto = $(".valorTotalImpuesto").html();
   
    var envio = $(".valorTotalEnvio").html();
    
    var subtotal = $(".valorSubtotal").html();
    
    var titulo = $(".valorTitulo");
    
    var cantidad = $(".valorCantidad");
   
    var valorItem = $(".valorItem");
    
    var idProducto = $('.cuerpoCarrito button');

    var envioCosto=$('#envioNacional').val();

   
    

    var tituloArray = [];
    var cantidadArray = [];
    var valorItemArray = [];
    var idProductoArray = [];

    for(var i = 0; i < titulo.length; i++){

        tituloArray[i] = $(titulo[i]).html();
        cantidadArray[i] = $(cantidad[i]).html();
        valorItemArray[i] = $(valorItem[i]).html();
        idProductoArray[i] = $(idProducto[i]).attr("idProducto");

    }



   

    $("#subtotal_De").val(subtotal);
    $("#igv_De").val(impuesto);
    $("#total_De").val(total);
    $("#costoEnvio_De").val(envioCosto);
    $(".valorTotalEnvio").html(envioCosto);

});


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
        SUMA TOTAL DE LA COMPRA
=============================================*/
function sumaTotalEnvio()
{
    var sumaTotalTasas=Number($(".valorSubtotal").html())+
                        Number($(".valorTotalEnvio").html())+
                        Number($(".valorTotalImpuesto").html())
    $(".valorTotalCompra").html(sumaTotalTasas.toFixed(2));
    $(".valorTotalCompra").attr("valor",sumaTotalTasas.toFixed(2));
}






