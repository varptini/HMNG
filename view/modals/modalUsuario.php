                        <div class="modal inmodal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-trash modal-icon"></i>
                                            <h4 class="modal-title">Eliminar usuario</h4>
                                            <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                        </div>
                                        <form role="form" id="formEliminarUsuario" name="formEliminarRol">
                                            <div class="modal-body">
                                                <p ><strong>¿Esta seguro de eliminar el usuario?</strong></p>
                                                <input id="inputIdUsuario" name="inputIdUsuario" required="true" type="hidden" value=""  class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                                <button class="btn  btn-danger btn-sm " id="ButtonEliminarUsuario" name="ButtonEliminarUsuario"  type="submit">Eliminar</button>
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
                                            <h4 class="modal-title">Modificar datos del usuario</h4>
                                            <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                        </div>
                                        <form role="form" id="formModificarUsuario" name="formModificarUsuario">
                                            <div class="modal-body">
                                                <label id="MensajeModificar"></label>   
                                                    <div id="mostrarUsuariomodificarDatos"></div> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                                <button class="btn btn-primary" type="submit">Registrar</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>