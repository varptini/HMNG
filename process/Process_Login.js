$(function(){
    $("#loginForm").submit(function(){
        var datos = $("#loginForm :input").serialize();
        var curl = "process/ValidarAdmin.php";
        $.ajax({
            url:curl,
            data:datos,
            method:"post",
            cache:false,
            context:this,
            success:function(data){
                console.log(data.toString());
                if(data=='Usuario'){//usuario Incorrecto
                    $("#respuesta").html("<pre><code style=''><i class= 'fa fa-user-times'></i> No Existe Usuario </code></pre>");
                }else if(data=='Incorrecto'){//contraseña Incorrecta
                    $("#respuesta").html("<pre><code style=''><i class= 'fa fa-times'></i> Contraseña Incorrecta </code></pre>");
                }else if(data=="Desabilitado"){//usuario correcto
                    $("#respuesta").html("<pre><code style=''><i class= 'fa fa-times'></i> Usuario Desabilitado </code></pre>");
                }else{
                    this.submit();
                }
                return false; 
            }
        });
        return false;
    });
});

