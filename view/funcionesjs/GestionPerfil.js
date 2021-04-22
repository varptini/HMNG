$(function (){
    
   
    
    $('#formModificarPerfil').submit(function ( e ) {

        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: "../gestion/ActualizarPerfil.php", //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
                success: function (result) {
                    if (result == "false") {
                        $("#ResultadoModificarPerfil").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='btn close' data-dismiss='alert'>&times;</button><strong>¡No se han rellenado campos obligatorios!</strong> </div>");
                    }else{
                        $("#ResultadoModificarPerfil").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡La Actualizacion de Datos se Realizó Correctamente!</strong></div>");
                    }
                }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    });
    
    $(".btn_VerPerfil").click(function() {
        $('#ModalPerfil').modal({backdrop: 'static', keyboard: false});
           var valores = "";
           valores = $("#IDEmpleadoPerfil").val();
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorPerfil.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarPerfilmodificarDatos").html(resp);
                        }
                    }
                });
            
    });
    $(".btn_ModificarPerfil").click(function(){
        var valores = "";
           $('.bnt_submit').removeAttr('disabled');
           $(".btn_ModificarPerfil").attr("disabled","disabled")
           valores = $("#IDEmpleadoPerfil").val();
                $.ajax({
                    type: 'POST',
                    url: '../gestion/BuscadorPerfilModificar.php',
                    data: ('inputBuscador=' + valores),
                    success: function (resp) {
                        if (resp != '') {
                            $("#mostrarPerfilmodificarDatos").html(resp);
                        }
                    }
                });
    });
    $(".bnt_cancelar").click(function(){           
        $('.btn_ModificarPerfil').removeAttr('disabled');
        $(".bnt_submit").attr("disabled","disabled");
    });
///No tocar
 });
///No tocar
