$(function (){
    $('#formHacerPedido').submit(function ( e ) {

        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: "../gestion/InsertarPedidoTemporal.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
                success: function (result) {
    //                alert(result);
                    if (result == "false") {
                        $("#ResultadoHacerPedido").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='btn close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong> </div>");
                    }else{
                        $("#ResultadoHacerPedido").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Asignación de los Insumos al Pedido se Realizó Correctamente!</strong></div>");
                        LimpiarCampos();
                    }
                }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
$('#formVerificarPedido').submit(function ( e ) {

        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: "../gestion/InsertarPedido.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
                success: function (result) {
    //                alert(result);
                    if (result == "false") {
                        $("#ResultadoVerificarPedido").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='btn close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong> </div>");
                    }else{
                        $("#ResultadoVerificarPedido").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Verificacion del Pedido se Realizó Correctamente!</strong></div>");
//                        LimpiarCampos();
                    }
                }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
 
});


$(document).ready(function() { $('.TablaPedido').footable();});

$(document).on('click', '.bt_verPedido', function () {
            var valores = "";
            
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idpedido").each(function() {
                valores += $(this).html() + "\n";
                console.log(valores);
                $("#inputidPedidoVista").val(valores)
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorPedidoMostrar.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarPedido").html(resp);
                        }
                    }
                });
            });
});
$(document).on('click','.bt_VerificarPedido', function () {
            var valores = "";
            
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idpedido").each(function() {
                valores += $(this).html() + "\n";
                console.log(valores);
//                $("#inputidPedidoVista").val(valores)
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorPedidoVerificar.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#MostrarVerificarPedido").html(resp);
                        }
                    }
                });
            });
});
$(document).on('click','.bt_verPedidoConcluido', function () {
            var valores = "";
            
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find(".idpedido").each(function() {
                valores += $(this).html() + "\n";
                console.log(valores);
                $("#inputidPedidoVerificado").val(valores)
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorPedidoVerificado.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#MostrarPedidoVerificado").html(resp);
                        }
                    }
                });
            });
});
$(document).on('click', 'input[name="checkboxInsumos[]"]', function () {
            var checked = $(this).prop('checked');// true or false
            if (checked) {
                $(this).parents('tr').find('td input[Name="Cantidad[]"]').removeAttr('disabled');
                $(this).parents('tr').find('td input[Name="Cantidad[]"]').focus();
            }
            else {
                $(this).parents('tr').find('td input[Name="Cantidad[]"]').attr('disabled','disable');
            }
});

function LimpiarCampos() {
//    $("#combPlanesEstudio").val("#");
    //Deseleccionar todos
    $("input:checkbox").prop('checked', false);
    $("input[type=checkbox]").prop('checked', false);
    $("input[type=number]").attr('disabled','disable');
}

//function ModalMostrarPedido() {
//    $("#ModalMostrarPedido").modal('hide');//ocultamos el modal
//    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
//    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
//}
//function ModalAutorizarPedido() {
//    $("#ModalAutorizarPedido").modal('hide');//ocultamos el modal
//    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
//    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
//}
//function ModalMostrarPedidoConcluido() {
//    $("#ModalMostrarPedidoConcluido").modal('hide');//ocultamos el modal
//    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
//    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
//}

