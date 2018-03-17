/*=============================================
UPDATE CATEGORIA
=============================================*/
$("#btnactualizarCa").click(function() {

	var NameCategoria = $("#NameCategoria").val();
	var Descripcion = $("#Descripcion").val();
	var ruta = $("#ruta").val();
	var idCategoria = $("#idCategoria").val();

	var datos = new FormData();
	datos.append("NameCategoria", NameCategoria);
	datos.append("Descripcion", Descripcion);
	datos.append("ruta", ruta);
	datos.append("idCategoria", idCategoria);

	$.ajax({

		url: "ajax/categoria.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			swal({
				title: "Cambios guardados!",
				text: "¡La categoria ha sido actualizada correctamente!",
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



/*=============================================
AGREGAR CATEGORIA
=============================================*/
$("#btnAgregarCategoria").click(function() {

	var NameCategoria = $("#NameCategoria").val();
	var Descripcion = $("#Descripcion").val();
	var ruta = $("#ruta").val();
	var Estado = 1;
	var oferta = 0;
	var precioOferta = 0;
	var descuentoOferta = 0;
	var imgOferta = "";
	var finOferta = "";
	var fecha = "";

	var datos = new FormData();
	datos.append("NameCategoria", NameCategoria);
	datos.append("Descripcion", Descripcion);
	datos.append("ruta", ruta);
	datos.append("Estado", Estado);
	datos.append("oferta", oferta);
	datos.append("precioOferta", precioOferta);
	datos.append("descuentoOferta", descuentoOferta);
	datos.append("imgOferta", imgOferta);
	datos.append("finOferta", finOferta);
	datos.append("fecha", fecha);

	$.ajax({

		url: "ajax/categoria.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			swal({
					title: "Categoria guardado!",
					text: "¡La categoria ha sido guardado correctamente!",
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



$(".eliminarCat").click(function() {

	var codCategoria = $(this).attr("codCategoria");
	swal({
		title: '¿Está  seguro(a) de eliminar esta categoria?',
		text: "¡Si borrar esta categoria se eliminaran productos que pertenecen a esta categoria!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, cancel!',
		confirmButtonClass: 'btn btn-success',
		cancelButtonClass: 'btn btn-danger',
		buttonsStyling: false,
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				url: "ajax/categoria.ajax.php",
				method: "POST",
				data: {
					codCategoria: codCategoria
				},
				success: function(respuesta) {
					console.log(respuesta);
				}
			});

			swal(
				'Eliminado!',
				'Categoria fue eliminado.',
				'success'
			)
		} else{
			swal(
				'Cancelado',
				'Todo bien, la categoria no fue eliminado)',
				'error'
			)
		}
	});
});