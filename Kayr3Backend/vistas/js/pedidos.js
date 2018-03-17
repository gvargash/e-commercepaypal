$(".btnanularpe").click(function(){
	var idPedido=$(this).attr("idPedido");
	var envio=2;
	swal({
		title: '¿Está  seguro(a) de anular este pedido?',
		text: "¡Le recomedamos contactarse con el cliente antes de realizar este procesos!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#26EF0B',
		confirmButtonText: 'Si,anular!',
		cancelButtonText: 'No, Cancelar!',
		confirmButtonClass: 'btn btn-danger',
		cancelButtonClass: 'btn btn-success',
		buttonsStyling: false,
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				url: "ajax/pedido.ajax.php",
				method: "POST",
				data: {
					idPedido: idPedido,
					envio:envio
				},
				success: function(respuesta) {
					console.log(respuesta);
				}
			});

			swal(
				'Anulado!',
				'Pedido fue Anulado.',
				'success'
			)
		} else{
			swal(
				'Cancelado',
				'Todo bien, el pedido no fue anulado)',
				'error'
			)
		}
	});

});




$(".btnaceptarpe").click(function(){
	var idPedido=$(this).attr("idPedido");
	var envio=1;
	swal({
		title: '¿Está  seguro(a) de aceptar este pedido?',
		text: "¡Le recomedamos contactarse con el cliente antes de realizar este procesos!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#26EF0B',
		confirmButtonText: 'Si,Aceptar!',
		cancelButtonText: 'No, Cancelar!',
		confirmButtonClass: 'btn btn-success',
		cancelButtonClass: 'btn btn-danger',
		buttonsStyling: false,
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				url: "ajax/pedido.ajax.php",
				method: "POST",
				data: {
					idPedido: idPedido,
					envio:envio
				},
				success: function(respuesta) {
					console.log(respuesta);
				}
			});

			swal(
				'Aceptado!',
				'Pedido fue aceptado.',
				'success'
			)
		} else{
			swal(
				'Cancelado',
				'Todo bien, el pedido no fue aceptado)',
				'error'
			)
		}
	});

});




$(".btncompletar").click(function(){
	var idPedido=$(this).attr("idPedido");
	var envio=3;
	swal({
		title: '¿Está  seguro(a) que este pedido fue satisfactorio?',
		text: "¡Una pedido completado cuenta como una venta!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#26EF0B',
		confirmButtonText: 'Si,Aceptar!',
		cancelButtonText: 'No, Cancelar!',
		confirmButtonClass: 'btn btn-success',
		cancelButtonClass: 'btn btn-danger',
		buttonsStyling: false,
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				url: "ajax/pedido.ajax.php",
				method: "POST",
				data: {
					idPedido: idPedido,
					envio:envio
				},
				success: function(respuesta) {
					console.log(respuesta);
				}
			});

			swal(
				'Aceptado!',
				'Pedido fue Completado.',
				'success'
			)
		} else{
			swal(
				'Cancelado',
				'Todo bien, el pedido no fue Completado)',
				'error'
			)
		}
	});

});