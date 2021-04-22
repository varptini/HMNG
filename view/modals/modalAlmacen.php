<!--//MODAL PARA ELIMINAR AL INSUMOS SELECCIONADO-->
<div class="modal inmodal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-trash modal-icon"></i>
                    <h4 class="modal-title">Eliminar Almacen</h4>
                   
                </div>
                <form role="form" id="formEliminarAlmacen" name="formEliminarAlmacen">
                    <div class="modal-body">
                        <p ><strong>¿Esta seguro de eliminar el almacen?</strong></p>
                        <input id="inputIdAlmacen" name="inputIdAlmacen" required="true" type="hidden" value=""  class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn  btn-danger " id="ButtonEliminarAlmacen" name="ButtonEliminarAlmacen"  type="submit">Eliminar</button>
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
                    <h4 class="modal-title">!Modificar datos del almacen¡</h4>
                    <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                </div>
                <form role="form" id="formModificarAlmacen" name="formModificarAlmacen">
                    <div class="modal-body">
                            <div id="mostrarAlmacenmodificarDatos"></div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
        </div>
    </div>
</div>