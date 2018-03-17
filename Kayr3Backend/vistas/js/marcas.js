$("#btnAgregarMarca").click(function() {
	var NameMarca = $("#NameMarca").val();
	var ruta = $("#ruta").val();
	var Estado = 1;
	var ofertadoPorCategoria = 0;
	var oferta = 0;
	var precioOferta = 0;
	var descuentoOferta = 0;
	var imgOferta = "";
	var finOferta = "";
	var fecha = "";

	var datos = new FormData();
	datos.append("NameMarca", NameMarca);
	datos.append("ruta", ruta);
	datos.append("Estado", Estado);
	datos.append("ofertadoPorCategoria", ofertadoPorCategoria);
	datos.append("oferta", oferta);
	datos.append("precioOferta", precioOferta);
	datos.append("descuentoOferta", descuentoOferta);
	datos.append("imgOferta", imgOferta);
	datos.append("finOferta", finOferta);
	datos.append("fecha", fecha);

	$.ajax({

		url: "ajax/marca.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			swal({
					title: "Marca guardado!",
					text: "¡La Marca ha sido guardado correctamente!",
					type: "success",
					confirmButtonText: "OK",
					confirmButtonColor: "#C407C6",
					closeOnConfirm: false
				},

				function(isConfirm) {
					console.log(respuesta);
				});

		}

	})


})



/*=============================================
UPDATE marca
=============================================*/
$("#btnactualizarMa").click(function() {

	var NameMarca=$("#Namemarca").val();
	var ruta =$("#ruta").val();
	var idMarca=$("#idMarca").val();

	var datos = new FormData();
	datos.append("NameMarca", NameMarca);
	datos.append("ruta", ruta);
	datos.append("idMarca", idMarca);

	$.ajax({

		url: "ajax/marca.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			swal({
				title: "Cambios guardados!",
				text: "¡La marca ha sido actualizada correctamente!",
				type: "success",
				showConfirmButton: true,
				confirmButtonColor: "#C407C6",
				confirmButtonText: 'Ok!'
			}).then((result) => {
				if (result.value) {
					history.back();
				}
			})

		}

	})

})



$(".eliminarMar").click(function() {

	var codMarca = $(this).attr("codMarca");

	swal({
		title: '¿Está  seguro(a) de eliminar esta marca?',
		text: "¡Si borrar esta marca se eliminaran productos que pertenecen a esta marca!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		cancelButtonColor: '#3085d6',
		confirmButtonText: 'Si, Elimina!',
		cancelButtonText: 'No, Cancelar!',
		confirmButtonClass: 'btn btn-success',
		cancelButtonClass: 'btn btn-danger',
		buttonsStyling: false,
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				url: "ajax/marca.ajax.php",
				method: "POST",
				data: {
					codMarca: codMarca
				},
				success: function(respuesta) {
					
				}
			});

			swal(
				'Eliminado!',
				'La marca fue eliminado.',
				'success'
			)
		}else{
		swal(
				'Cancelado',
				'Todo bien, la marca no fue eliminado)',
				'error'
			)
		}
	})
})