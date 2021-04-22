<!--//MODAL PARA ELIMINAR AL INSUMOS SELECCIONADO-->
<div class="modal inmodal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-trash modal-icon"></i>
                    <h4 class="modal-title">Eliminar Insumo</h4>
                   
                </div>
                <form role="form" id="formEliminarInsumo" name="formEliminarInsumo">
                    <div class="modal-body">
                        <p ><strong>¿Esta seguro de eliminar el insumo?</strong></p>
                        <input id="inputIdInsumo" name="inputIdInsumo" required="true" type="hidden" value=""  class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn  btn-danger " id="ButtonEliminarInsumo" name="ButtonEliminarInsumo"  type="submit">Eliminar</button>
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
                    <h4 class="modal-title">!Modificar datos del insumo¡</h4>
                    <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                </div>
                <form role="form" id="formModificarInsumo" name="formModificarInsumo">
                    <div class="modal-body">
                            <div id="mostrarInsumomodificarDatos"></div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<!--//MODAL PARA AGREGAR STOCK AL INSUMOS SELECCIONADO--> 
<div class="modal inmodal fade" id="ModalStock" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-calendar-plus-o modal-icon"></i>
                    <h4 class="modal-title">!Agregar Stock al insumo¡</h4>
                    <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                </div>
                <form role="form" id="formAgregarStockInsumo" name="formAgregarStockInsumo">
                    <div class="modal-body">
                            <div id="mostrarAgregarStockInsumo"></div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
        </div>
    </div>
</div>