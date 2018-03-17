/*=============================================
 CAPTURA DE RUTA
 =============================================*/

var rutaActual = location.href;
$(".btnIngreso, .facebook, .google").click(function() {
    localStorage.setItem("rutaActual", rutaActual);
});



/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/

var validarEmailRepetido = false;

$("#regCorreoInput").change(function() {

    var email = $("#regCorreoInput").val();

    var datos = new FormData();
    datos.append("validarEmail", email);

    $.ajax({
        url: rutaOculta + "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta == "false") {

                $(".swal").remove();
                validarEmailRepetido = false;

            } else {

                var modo = JSON.parse(respuesta).modo;

                if (modo == "directo") {

                    modo = "esta página";
                }

                $("#regCorreoInput").parent().before(swal({
                    title: 'Error',
                    text: 'Este correo electronico ya existe en la base de datos, fue registrado através de ' + modo + ',por favor ingrese otro correo!',
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#C407C6'
                }))

                validarEmailRepetido = true;

            }

        }
    })
})


/*=============================================
 VALIDAR REGISTRO DE USUARIO 
 =============================================*/

function registroUsuario() {
    var politicas = $("#test5:checked").val();

    if (validarEmailRepetido) {
        $("#regCorreoInput").parent().before(swal({
            title: 'Error',
            text: 'Este correo electronico ya existe en la base de datos,por favor ingrese otro correo!',
            type: 'error',
            showCancelButton: false,
            confirmButtonColor: '#C407C6'
        }))
        return false;
    }
    /*=============================================
     VALIDAR POLITICAS DE PRIVACIDAD
     =============================================*/
    if (politicas != "on") {
        $("#test5").parent().before(swal({
            title: 'ATENCION',
            text: "Debes aceptar las politicas de privacidad!",
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#C407C6'
        }))
        return false;
    }

    return true;
}
/*=============================================
CAMBIAR FOTO
=============================================*/

$("#btnCambiarFoto").click(function() {

    $("#imgPerfil").toggle();
    $("#subirImagen").toggle();

})

$("#datosImagen").change(function() {

    var imagen = this.files[0];

    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN
    =============================================*/

    if (imagen["type"] != "image/jpeg") {

        $("#datosImagen").val("");

        swal({
                title: "Error al subir la imagen",
                text: "¡La imagen debe estar en formato JPG!",
                type: "error",
                confirmButtonText: "¡Ok!",
                confirmButtonColor: '#C407C6',
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = rutaOculta + "perfil";
                }
            });

    } else if (Number(imagen["size"]) > 2000000) {

        $("#datosImagen").val("");

        swal({
                title: "Error al subir la imagen",
                text: "¡La imagen no debe pesar más de 2 MB!",
                type: "error",
                confirmButtonText: "¡Ok!",
                confirmButtonColor: '#C407C6',
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = rutaOculta + "perfil";
                }
            });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {

            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);

        })

    }


})
/*=============================================
LISTA DE DESEOS
=============================================*/
$(".deseos").click(function() {
    var idProducto = $(this).attr("idProducto");
    var idUsuario = localStorage.getItem("usuario");
    if (idUsuario == null) {

        swal({
            title: "Debe ingresar al sistema",
            text: "¡Para agregar un producto a la 'lista de deseos' debe primero ingresar al sistema!",
            type: "warning",
            confirmButtonText: "¡OK!",
            confirmButtonColor: '#C407C6',
            closeOnConfirm: false
        });

    } else {

        $(this).addClass("btn-danger");

        var datos = new FormData();
        datos.append("idUsuario", idUsuario);
        datos.append("idProducto", idProducto);

        $.ajax({
            url: rutaOculta + "ajax/usuarios.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                console.log("respuesta", respuesta);

            }

        })

    }
});

/*=============================================
BORRAR PRODUCTO DE LISTA DE DESEOS
=============================================*/

$(".quitarDeseo").click(function() {

    var idDeseo = $(this).attr("idDeseo");

    $(this).parent().parent().remove();

    var datos = new FormData();
    datos.append("idDeseo", idDeseo);

    $.ajax({
        url: rutaOculta + "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

        }

    });


})


/*=============================================
ELIMINAR USUARIO
=============================================*/

$("#eliminarUsuario").click(function() {

    var idUsuario = $("#idUsuario").val();

    if ($("#modoUsuario").val() == "directo") {

        if ($("#fotoUsuario").val() != "") {

            var foto = $("#fotoUsuario").val();

        }

    }

    swal({
            title: "¿Está  seguro(a) de eliminar su cuenta?",
            text: "¡Si borrar esta cuenta ya no se puede recuperar los datos!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DF0C0C",
            confirmButtonText: "¡Si, borrar cuenta!",
            closeOnConfirm: false
        },
        function(isConfirm) {
            if (isConfirm) {
                window.location = "index.php?ruta=perfil&idUsuario=" + idUsuario + "&fotoUsu=" + foto;
            }
        });

});



$("#btnatualizar").click(function() {
    var Celular = $("#Celular").val();
    console.log("Celular", Celular);
    var telefono = $("#telefono").val();
    console.log("telefono", telefono);
    var direccion = $("#direccion").val();
    console.log("direccion", direccion);
    var referencia = $("#referencia").val();
    console.log("referencia", referencia);
    var Departamento = $("#Departamento").val();
    console.log("Departamento", Departamento);
    var Provincia = $("#Provincia").val();
    console.log("Provincia", Provincia);
    var Distrito = $("#Distrito").val();
    console.log("Distrito", Distrito);
    var Estado = 1;
    console.log("Estado", Estado);
    var codUsuario = $("#codUsuario").val();
    console.log("codUsuario", codUsuario);

    var datos = new FormData();
    datos.append("Celular", Celular);
    datos.append("telefono", telefono);
    datos.append("direccion", direccion);
    datos.append("referencia", referencia);
    datos.append("Departamento", Departamento);
    datos.append("Provincia", Provincia);
    datos.append("Distrito", Distrito);
    datos.append("Estado", Estado);
    datos.append("codUsuario", codUsuario);

    $.ajax({

        url: "ajax/direccion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            swal({
                    title: "¡BIEN!",
                    text: "¡Su direccion ha sido actualizada correctamente!",
                    type: "success",
                    confirmButtonText: "Ok",
                    confirmButtonColor: "#e040fb",
                    closeOnConfirm: true
                },

                function(isConfirm) {


                });

        }
    });

});