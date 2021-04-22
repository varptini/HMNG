<div class="modal inmodal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-trash modal-icon"></i>
                    <h4 class="modal-title">Eliminar cargo</h4>
                    
                </div>
                <form role="form" id="formEliminarRol" name="formEliminarRol">
                    <div class="modal-body">
                        <p ><strong>¿Esta seguro de eliminar el cargo?</strong></p>
                        <input id="inputIdRol" name="inputIdRol" required="true" type="hidden" value=""  class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn  btn-danger " id="ButtonEliminarRol" name="ButtonEliminarRol"  type="submit">Eliminar</button>
                    </div>
              </form>

            </div>
    </div>
</div>
<div class="modal inmodal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-trash modal-icon"></i>
                    <h4 class="modal-title">Modificar datos del cargo</h4>
                    
                </div>
                <form role="form" id="formModificarCargo" name="formModificarCargo">
                    <div class="modal-body">
                            <div id="mostrarCargomodificarDatos"></div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
        </div>
    </div>
</div>