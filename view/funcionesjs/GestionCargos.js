$(function (){
    $('#CrearCargo').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: "../gestion/InsertarCargo.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if (result == "existe") {
                    $("#resultado").html("<div class='alert alert-info'><button autofocus type='button' autofocus class='close' data-dismiss='alert'>&times;</button><strong>¡El Cargo ya se encuentra registrado en el sistema!</strong></div>");
                } else if (result == "true") {
                    $("#resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Cargo se registró correctamente!</strong></div>");
                    LimpiarCampos();
                } else {
                    $("#resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong> </div>");
                }
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    }); 
    
    //--------------------INICIO PROCESO DE ELIMINACION----------------------------//
    $('#formEliminarRol').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/EliminarCargo.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == "existeUsuario"){
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El cargo no se puede eliminar ya que se encuentra asignada a usuarios!</strong></div>");
                }else{
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El cargo ha sido eliminado exitosamente!</strong></div>");
                             
                }
                    CierraPopupEliminar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });  
    //Funcion para obtener dato a aliminar *idcargo* de la tbla 
    $(".bt_eliminarCargo").click(function() {
            var valores = "";
            $("#ModalEliminar").modal({
                show: true,
                backdrop: "static"
            });
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idcargo").each(function() {
              valores += $(this).html() + "\n";
              $("#inputIdRol").val(valores);
            });
    }); 
    
//--------------------INICIO PROCESO DE MODIFICACION----------------------------//
    $('#formModificarCargo').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/ActualizarCargo.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == 'true'){
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El cargo se a modificado exitosamente!</strong></div>");
                }else{
                    
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong></div>");
                             
                }
                    CierraPopupModificar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    $(".bt_editarCargo").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idcargo").each(function() {
                valores += $(this).html() + "\n";
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorCargo.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarCargomodificarDatos").html(resp);
                        }
                    }
                });
            });
    });  
});
function LimpiarCampos(){
  $("#inputNombreCargo").val("");
  $("#textareaDescripcionCargo").val("");
  
}
function CierraPopupEliminar() {
    $("#ModalEliminar").modal('hide');//ocultamos el modal
//    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
//    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}
function CierraPopupModificar() {
    $("#ModalModificar").modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}
