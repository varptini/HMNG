//    --------------------INICIO PROCESO DE INSERCION----------------------------//
$(function (){
    $('#formRegistrarInsumoNuevo').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: "../gestion/InsertarInsumo.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if (result=="verdadero" ) {
                    $("#Resultado").html("<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El insumo se registró correctamente!</strong></div>");
                    LimpiarCampos();
//                } else if (result == "RegistroCodigoExistencia") {
//                    $("#resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Insumo se encontro registrado, se actualizo existencia y codigo barras!</strong></div>");
//                    LimpiarCampos();
                } else {
                    $("#Resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong> </div>");
                }
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    
//    --------------------INICIO PROCESO DE ELIMINACION----------------------------//
    $('#formEliminarInsumo').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
//        for (var pair of data.entries()) {
//            console.log(pair[0]+ ', ' + pair[1]); 
//        }

        $.ajax({        
            url: "../gestion/EliminarInsumo.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == 'existeStock'){
                    $("#Resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Insumo no se puede eliminar ya que se encuentra con stock en almacen!</strong></div>");
//                       
                }else if(result == 'existePedido'){
                        $("#Resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Insumo no se puede eliminar ya que se encuentra asignado a pedidos!</strong></div>");
                }else{
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El Insumo ha sido eliminado exitosamente!</strong></div>");
//                    CierraPopup();    
                }
                    CierraPopupEliminar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });  
//    Funcion para obtener dato a aliminar *idempleado* de la tbla 
    $(".bt_eliminarInsumo").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idinsumos").each(function() {
//                
//              document.getElementById("inputIdRol").val(valores);
              valores += $(this).html() + "\n";
              console.log(valores);
              $("#inputIdInsumo").val(valores);
//              console.log(valores);
            });
    });  
//--------------------INICIO PROCESO DE MODIFICACION----------------------------//
    $('#formModificarInsumo').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/ActualizarInsumo.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == 'actualizado'){
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El insumo se a modificado exitosamente!</strong></div>");
                }else{
                    
                    $("#Resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong></div>");
                             
                }
                    CierraPopupModificar();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    $(".bt_editarInsumo").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idinsumos").each(function() {
                valores += $(this).html() + "\n";
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorInsumo.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarInsumomodificarDatos").html(resp);
                        }
                    }
                });
            });
    });  
//--------------------INICIO PROCESO DE STOCK----------------------------//
    $('#formAgregarStockInsumo').submit(function (e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario

        $.ajax({        
            url: "../gestion/ActualizarInsumoStock.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (result) {
                if(result == 'RegistroConCodigo'){
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Codigo existente se registro insumo stock exitosamente!</strong></div>");
                }else if(result=='RegistroSinCodigo'){
                    setTimeout("location.reload()", 5000);
                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Se registro stock y codigo de barras exitosamente!</strong></div>");
                             
                }else{
                     $("#Resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong></div>");
                }
                    CierraPopupStock();
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    $(".bt_AgregarStockInsumo").click(function() {
            var valores = "";
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idinsumos").each(function() {
                valores += $(this).html() + "\n";
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorInsumoStock.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarAgregarStockInsumo").html(resp);
                        }
                    }
                });
            });
    }); 
    //--------------------INICIO PROCESO DE STOCK  MEDIANTE SEARCH----------------------------//
//    $('#formAgregarStockInsumo').submit(function (e) {
//        var data = new FormData(this); //Creamos los datos a enviar con el formulario
//
//        $.ajax({        
//            url: "../gestion/ActualizarInsumoStock.php", //URL destino
//            data: data,
//            processData: false, //Evitamos que JQuery procese los datos, daría error
//            contentType: false, //No especificamos ningún tipo de dato
//            type: 'POST',
//            success: function (result) {
//                if(result == 'RegistroConCodigo'){
//                    setTimeout("location.reload()", 5000);
//                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Codigo existente se registro insumo stock exitosamente!</strong></div>");
//                }else if(result=='RegistroSinCodigo'){
//                    setTimeout("location.reload()", 5000);
//                    $("#Resultado").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Se registro stock y codigo de barras exitosamente!</strong></div>");
//                             
//                }else{
//                     $("#Resultado").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong></div>");
//                }
//                    CierraPopupStock();
//            }
//        });
//
//        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
//    });
    $("#formBuscarXCodBarra").submit(function(e) {
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    $('#ModalStock').modal({backdrop: 'static', keyboard: false});
                $.ajax({
                     url: "../gestion/BuscadorInsumoCod.php", //URL destino
                    data: data,
                    processData: false, //Evitamos que JQuery procese los datos, daría error
                    contentType: false, //No especificamos ningún tipo de dato
                    type: 'POST',
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarAgregarStockInsumo").html(resp);
                        }
                    }
                });
           e.preventDefault(); //Evitamos que se mande del formulario de forma convencional 
    });
});
function LimpiarCampos(){
  $("#inputCodigoBarra").val("");
  $("#inputInsumoNombreComercial").val("");
  $("#inputInsumoNombreGenerico").val("");
  $("#inputInsumoDescripcion").val("");
//  $("#selectInsumoUnidadMedida").val("");
  $("#inputinsumoCantidadMinima").val("");
  $("#inputinsumoExistencia").val("");
  $("#inputinsumoFechaCaducidad").val("");
//  $("#selectInsumoAlmacen").val("1");
  
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
function CierraPopupStock() {
    $("#ModalStock").modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}
