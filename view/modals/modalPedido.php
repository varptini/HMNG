<div class="modal inmodal fade" id="ModalMostrarPedido" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h2 class="modal-title">Vista Pedido</h2>
                    
                </div>
            
                    <div class="modal-body ">
                        <div id="mostrarPedido"></div> 

                    </div>
            <form role="form" action="Pedido.php" method="POST" target="_blank"  id="GenerarArchivo" name="GenerarArchivo">
                <input id="inputidPedidoVista" name="inputidPedidoVista" required="true" type="hidden" value=""  class="form-control">
                <input id="NombreEmpleadoVista" name="NombreEmpleadoVista" required="true" type="hidden" value="<?php echo $_SESSION["Admin"]; ?>"  class="form-control">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                        <button class="btn  btn-danger " type="submit">Generar Archivo</button>
                    </div>
            </form>

        </div>
    </div>
</div>
<div class="modal inmodal fade" id="ModalAutorizarPedido" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInUp">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h2 class="modal-title">Autorizacion de pedido</h2>
                    
                </div>
                <form role="form" id="formVerificarPedido" name="formVerificarPedido">
                    <div class="modal-body">
                        <div class="col-sm-12" id="ResultadoVerificarPedido" ></div> 
                        <div id="MostrarVerificarPedido"></div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<div class="modal inmodal fade" id="ModalMostrarPedidoConcluido" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h2 class="modal-title">Vista Pedido</h2>
                    
                </div>
            
                    <div class="modal-body ">
                        <div id="MostrarPedidoVerificado"></div> 

                    </div>
            <form role="form" action="PedidoVerificado.php" method="POST" target="_blank"  id="GenerarArchivo" name="GenerarArchivo">
                <input id="inputidPedidoVerificado" name="inputidPedidoVerificado" required="true" type="hidden" value=""  class="form-control">
                <input id="NombreEmpleadoVista" name="NombreEmpleadoVista" required="true" type="hidden" value="<?php echo $_SESSION["Admin"]; ?>"  class="form-control">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                        <button class="btn  btn-danger " type="submit">Generar Archivo</button>
                    </div>
            </form>

        </div>
    </div>
</div>