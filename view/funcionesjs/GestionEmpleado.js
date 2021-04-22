$(function (){
    $('#formRegistrarEmpleado').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: "../gestion/InsertarEmpleado.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
//                alert(result);
                if (result == "existe") {
                    $("#resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El empleado ya se encuentra registrado en el sistema!</strong></div>");
                } else if (result == "true") {
                    $("#resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El empleado se registró correctamente!</strong></div>");
                    LimpiarCampos();
                } else {
                    $("#resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong> </div>");
                }
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    
    
    
    //--------------------INICIO PROCESO DE ELIMINACION----------------------------//
    $('#formEliminarEmpleado').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
//        for (var pair of data.entries()) {
//            console.log(pair[0]+ ', ' + pair[1]); 
//        }

        $.ajax({        
            url: "../gestion/EliminarEmpleado.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == "existeUsuario"){
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El empleado no se puede eliminar ya que se encuentra asignado a usuarios activos!</strong></div>");
                }else{
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El empleado ha sido eliminado exitosamente!</strong></div>");
                             
                }
                    CierraPopupEliminar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });  
    //Funcion para obtener dato a aliminar *idempleado* de la tbla 
    $(".bt_eliminarEmpleado").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idempleado").each(function() {
//                
//              document.getElementById("inputIdRol").val(valores);
              valores += $(this).html() + "\n";
//              console.log(valores);
              $("#inputIdEmpleado").val(valores);
//              console.log(valores);
            });
    });
    
    
    
   //--------------------INICIO PROCESO DE MODIFICACION----------------------------//
    $('#formModificarEmpleado').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/ActualizarEmpleado.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == 'actualizado'){
//                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El empleado se a modificado exitosamente!</strong></div>");
                }else{
                    
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong></div>");
                             
                }
                    CierraPopupModificar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    $(".bt_editarEmpleado").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idempleado").each(function() {
                valores += $(this).html() + "\n";
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorEmpleado.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarEmpleadomodificarDatos").html(resp);
                        }
                    }
                });
            });
    });  
});
function LimpiarCampos(){
  $("#inputNombreEmpleado").val("");
  $("#inputDireccionEmpleado").val("");
  $("#inputTelefonoEmpleado").val("");
  $("#inputEmailEmpleado").val("");
  $("#inputCelularEmpleado").val("");
  $("#inputfechaNacEmpleado").val("");
  
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

