<!--//MODAL PARA MODIFICAR DATOS AL INSUMOS SELECCIONADO-->
<div class="modal inmodal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-user-circle-o modal-icon"></i>
                    <h4 class="modal-title">Datos de Perfil</h4>
                </div>
                <form role="form" id="formModificarPerfil" name="formModificarPerfil">
                    <div class="modal-body ">
                        <div id="ResultadoModificarPerfil"></div>
                        <div id="mostrarPerfilmodificarDatos">
                            
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-warning btn_ModificarPerfil pull-left" >Modificar</button>
                        <button type="button" class="btn btn-white bnt_cancelar" data-dismiss="modal">Salir</button>
                        <button type="submit"  class="btn btn-primary bnt_submit"  disabled="true" >Guardar</button>
                    </div>
                </form>
        </div>
    </div>
</div>