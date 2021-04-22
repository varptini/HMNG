                        <div class="modal inmodal fade " id="ModalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-trash modal-icon"></i>
                                            <h4 class="modal-title">Eliminar Empleado</h4>
                                            <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                        </div>
                                        <form role="form" id="formEliminarEmpleado" name="formEliminarEmpleado">
                                            <div class="modal-body">
                                                <p ><strong>¿Esta seguro de eliminar el empleado?</strong></p>
                                                <input id="inputIdEmpleado" name="inputIdEmpleado" value="" required="true" type="hidden"  class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                                <button class="btn  btn-danger btn-sm " id="ButtonEliminarRol" name="ButtonEliminarRol"  type="submit">Eliminar</button>
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
                                            <i class="fa fa-pencil-square-o modal-icon"></i>
                                            <h4 class="modal-title">Modificar datos del empleado</h4>
                                            <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                        </div>
                                        <form role="form" id="formModificarEmpleado" name="formModificarEmpleado">
                                            <div class="modal-body">
                                                <label id="MensajeModificar"></label>   
                                                    <div id="mostrarEmpleadomodificarDatos"></div> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                                <button class="btn btn-primary" type="submit">Modificar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>