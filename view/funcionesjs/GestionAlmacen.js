$(function (){
    $('#formRegistrarAlmacen').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: "../gestion/InsertarAlmacen.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if (result == "existe") {
                    $("#resultado").html("<div class='alert alert-info'><button autofocus type='button' autofocus class='close' data-dismiss='alert'>&times;</button><strong>¡El Almacen ya se encuentra registrado en el sistema!</strong></div>");
                } else if (result == "true") {
                    $("#resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Almacen se registró correctamente!</strong></div>");
                    LimpiarCampos();
                } else {
                    $("#resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong> </div>");
                }
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    }); 
    
    //--------------------INICIO PROCESO DE ELIMINACION----------------------------//
    $('#formEliminarAlmacen').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/EliminarAlmacen.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == "existeInsumo"){
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El almacen no se puede eliminar ya que se encuentra asignada a insumos!</strong></div>");
                }else{
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El almacen ha sido eliminado exitosamente!</strong></div>");
                             
                }
                    CierraPopupEliminar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });  
    //Funcion para obtener dato a aliminar *idcargo* de la tbla 
    $(".bt_eliminarAlmacen").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idalmacen").each(function() {
              valores += $(this).html() + "\n";
              $("#inputIdAlmacen").val(valores);
            });
    }); 
    
//--------------------INICIO PROCESO DE MODIFICACION----------------------------//
    $('#formModificarAlmacen').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/ActualizarAlmacen.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == 'actualizado'){
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El almacen se a modificado exitosamente!</strong></div>");
                }else{
                    
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong></div>");
                             
                }
                    CierraPopupModificar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    $(".bt_editarAlmacen").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idalmacen").each(function() {
                valores += $(this).html() + "\n";
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorAlmacen.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarAlmacenmodificarDatos").html(resp);
                        }
                    }
                });
            });
    });  
});
function LimpiarCampos(){
  $("#inputNombreAlmacen").val("");
  $("#inputDireccionAlmacen").val("");
  $("#inputTelefonoAlmacen").val("");
  $("#inputEmailAlmacen").val("");
  $("#inputEncargadoAlmacen").val("");
  
  
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
