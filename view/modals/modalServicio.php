<!--//MODAL PARA ELIMINAR AL INSUMOS SELECCIONADO-->
<div class="modal inmodal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-trash modal-icon"></i>
                    <h4 class="modal-title">Eliminar Servicio</h4>
                   
                </div>
                <form role="form" id="formEliminarServicio" name="formEliminarServicio">
                    <div class="modal-body">
                        <p ><strong>¿Esta seguro de eliminar el servicio?</strong></p>
                        <input id="inputIdServicio" name="inputIdServicio" required="true" type="hidden" value=""  class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn  btn-danger " id="ButtonEliminarServicio" name="ButtonEliminarServicio"  type="submit">Eliminar</button>
                    </div>
              </form>

            </div>
    </div>
</div>


<!--//MODAL PARA MODIFICAR DATOS AL INSUMOS SELECCIONADO-->
<div class="modal inmodal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-edit modal-icon"></i>
                    <h4 class="modal-title">!Modificar datos del servicio¡</h4>
                </div>
                <form role="form" id="formModificarServicio" name="formModificarServicio">
                    <div class="modal-body">
                            <div id="mostrarServiciomodificarDatos"></div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
        </div>
    </div>
</div>