<?php
require '../funciones/funciones.php';
$search="";

if(isset($_POST['inputBuscador'])){
    $search = $_POST['inputBuscador'];
}
$objbuscadroUsuario = new Listas();
$buscaUsuario = $objbuscadroUsuario ->BusquedaUsuario($search);
if(!empty($buscaUsuario)){
    foreach ($buscaUsuario as $row => $link)
    { 
?>
                                <div class="form-group">
                                    <label class=" control-label">Empleado</label>
                                    <input id="inputIdEmpleado" hidden="true" name="inputIdEmpleado"  value="<?php echo $link['idempleado']; ?>" type="text">
                                    <input id="inputNombreEmpleado" disabled="true" name="inputNombreEmpleado"  value="<?php echo $link['nombre']; ?>" autofocus required="true" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Nombre Usuario</label>
                                    <input id="inputId" hidden="true" name="inputIdUsuario"  value="<?php echo $link['idusuario']; ?>"  type="text" >
                                    <input id="inputNombreUsuario" readonly="true" name="inputNombreUsuario"  placeholder="Nombre Usuario" value="<?php echo $link['usuarionombre']; ?>" autofocus required="true" type="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Contraseña</label>
                                    <input id="inputContraseñaUsuario" name="inputContraseñaUsuario"  placeholder="Contraseña" value="<?php echo $link['usuariocontrasena']; ?>" autofocus required="true" autocomplete="new-password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Cargo en Sistema</label>
                                    <!--<br><label style="color: red">Valor Actual: <?php echo $link['rol'];?></label>-->
                                    
                                    <select class="form-control" id="inputCargoUsuario" name="inputCargoUsuario">
                                        <?php
                                            require_once '../funciones/funciones.php';
                                            $objListaRoles = new Listas();
                                            $listaRoles = $objListaRoles ->ListaRoles();
                                            foreach ($listaRoles as $row => $valores) {
                                                if($valores['rolnombre'] == $link['rol'] ){
                                                    echo '<option  selected="true" value="'.$valores['idrol'].'">'.$valores['rolnombre'].'</option>';
                                                }else{
                                                    echo '<option value="'.$valores['idrol'].'">'.$valores['rolnombre'].'</option>';
                                                }
                                              
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Estado</label><br>
                                    <!--<label style="color: red">Valor Actual: <?php if($link['usuarioactivo']==1){echo "Activo";}else{    echo 'No Activo';}?></label>-->
                                    <select class="form-control" id="inputEstadoUsuario" name="inputEstadoUsuario" >
                                         <?php 
                                         if($link['usuarioactivo']==1){
                                            echo '<option selected="true"  value="1"> Activo </option>';
                                            echo '<option value="2"> Inactivo </option>';    
                                         }else{    
                                            echo '<option  value="1"> Activo </option>';
                                            echo '<option selected="true"  value="2"> Inactivo </option>';
                                         }?>
                                    </select>
                                </div>





 <?php
    }
}
?>