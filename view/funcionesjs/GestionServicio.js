$(function (){
    $('#CrearServicio').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: "../gestion/InsertarServicio.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if (result == "existe") {
                    $("#resultado").html("<div class='alert alert-info'><button autofocus type='button' autofocus class='close' data-dismiss='alert'>&times;</button><strong>¡El Servicio ya se encuentra registrado en el sistema!</strong></div>");
                } else if (result == "true") {
                    $("#resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Servicio se registró correctamente!</strong></div>");
                    LimpiarCampos();
                } else {
                    $("#resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong> </div>");
                }
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    }); 
    
    //--------------------INICIO PROCESO DE ELIMINACION----------------------------//
    $('#formEliminarServicio').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/EliminarServicio.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == "existeAsignacion"){
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El servicio no se puede eliminar ya que se encuentra asignado!</strong></div>");
                }else{
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El servicio ha sido eliminado exitosamente!</strong></div>");
                             
                }
                    CierraPopupEliminar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });  
    //Funcion para obtener dato a aliminar *idcargo* de la tbla 
    $(".bt_eliminarServicio").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idservicio").each(function() {
              valores += $(this).html() + "\n";
              $("#inputIdServicio").val(valores);
            });
    }); 
    
//--------------------INICIO PROCESO DE MODIFICACION----------------------------//
    $('#formModificarServicio').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/ActualizarServicio.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == 'actualizado'){
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Servicio se a modificado exitosamente!</strong></div>");
                }else{
                    
                    $("#Resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong></div>");
                             
                }
                    CierraPopupModificar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    $(".bt_editarServicio").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idservicio").each(function() {
                valores += $(this).html() + "\n";
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorServicio.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarServiciomodificarDatos").html(resp);
                        }
                    }
                });
            });
    });  
});
function LimpiarCampos(){
  $("#inputNombreServicio").val("");
  $("#textareaDescripcionServicio").val("");
  
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
