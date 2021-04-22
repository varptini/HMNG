$(function (){
    $('#CrearUsuario').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: "../gestion/InsertarUsuario.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
//                alert(result);
                if (result == "existe") {
                    $("#resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El usuario ya se encuentra registrado en el sistema!</strong></div>");
                } else if (result == "true") {
                    $("#resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Usuario se registró correctamente!</strong></div>");
                    LimpiarCampos();
                } else {
                    $("#resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong> </div>");
                }
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    
    //--------------------INICIO PROCESO DE ELIMINACION----------------------------//
    $('#formEliminarUsuario').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
//        for (var pair of data.entries()) {
//            console.log(pair[0]+ ', ' + pair[1]); 
//        }

        $.ajax({        
            url: "../gestion/EliminarUsuario.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == 'false'){
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong></div>");
                }else{
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Usuario ha sido eliminado exitosamente!</strong></div>");
                    setTimeout("location.reload()", 5000);       
                }
                    CierraPopupEliminar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });  
    //Funcion para obtener dato a aliminar *idempleado* de la tbla 
    $(".bt_eliminarUsuario").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idusuario").each(function() {
//                
//              document.getElementById("inputIdRol").val(valores);
              valores += $(this).html() + "\n";
              console.log(valores);
              $("#inputIdUsuario").val(valores);
//              console.log(valores);
            });
    });
    
    //--------------------INICIO PROCESO DE MODIFICACION----------------------------//
    $('#formModificarUsuario').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/ActualizarUsuario.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result =='exito'){
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El usuario se a modificado exitosamente!</strong></div>");
                    
                }else{
                    $("#Resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong></div>");
                             
                }
                   CierraPopupModificar(); 
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    $(".bt_editarUsuario").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idusuario").each(function() {
                valores += $(this).html() + "\n";
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorUsuario.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarUsuariomodificarDatos").html(resp);
                        }
                    }
                });
            });
    }); 
    
});
function LimpiarCampos(){
  $("#inputNombreEmpleado").val("#");
  $("#inputNombreUsuario").val("");
  $("#inputContraseñaUsuario").val("");
  $("#inputCargoUsuario").val("#");
  $("#inputEstadoUsuario").val("#");
}
function CierraPopupEliminar() {
    $("#ModalEliminar").modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}
function CierraPopupModificar() {
    $("#ModalModificar").modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}

