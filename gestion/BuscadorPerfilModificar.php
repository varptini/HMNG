<?php session_start();
require '../funciones/funciones.php';
$search="";

if(isset($_POST['inputBuscador'])){
    $search = trim($_POST['inputBuscador']);
}

$objbuscadorPerfilMostrar = new Listas();
$buscadorPerfilMostrar = $objbuscadorPerfilMostrar ->BusquedaEmpleado($search);
$buscadorUsuarioMostrar = $objbuscadorPerfilMostrar ->DatosUsuario($_SESSION["IdUser"]);
if(!empty($buscadorPerfilMostrar)){
    foreach ($buscadorPerfilMostrar as $row => $link)
    { 
?>
       
        <div class="container-fluid">
            <div class="hr-line-solid"></div>   
            <div class="row">
                <div class="form-group col-sm-12">
                    <label class="control-label">Nombre:  </label>
                    <span style="font-size:15px;" class='badge badge-primary'><?php echo $link['empleadonombre']; ?></span>
                    <input type="text" hidden="true" value="<?php echo $link['idempleado']; ?>" name="inputidPerfilEmpleado" id="inputidPerfilEmpleado">
                </div>
            </div>
            <div class="hr-line-solid"></div>
            <h4>Datos Personales</h4>
            <div class="form-group">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Direccion:</label> 
                        <input type="text" autofocus required="true" class="form-control form-group" name="inputPerfilDireccion" id="inputPerfilDireccion"  value="<?php echo $link['empleadodireccion']; ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Telefono:</label> 
                        <input type="tel" autofocus required="true" class="form-control form-group" name="inputPerfilTelefono" id="inputPerfilTelefono"  value="<?php echo $link['empleadotelefono']; ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Correo:</label> 
                        <input type="email" autofocus required="true" class="form-control form-group" name="inputPerfilCorreo" id="inputPerfilCorreo"  value="<?php echo $link['empleadocorreo']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Celular:</label> 
                        <input type="tel" autofocus required="true" class="form-control form-group" name="inputPerfilCelular" id="inputPerfilCelular"  value="<?php echo $link['empleadocelular']; ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Fecha de Nacimiento:</label> 
                        <input type="date" autofocus required="true" class="form-control form-group" name="inputPerfilFecha" id="inputPerfilFecha"  value="<?php echo $link['empleadofechanacimiento']; ?>">
                    </div> 
                </div>
                <div class="hr-line-solid"></div>
                <h4>Cuenta de Usuario</h4>
                <div class="row">                
                    <?php    foreach ($buscadorUsuarioMostrar as $row1 => $link1)
                      { 
                    ?> 
                    <input type="number" hidden="true" name="inputUsuarioId" id="inputUsuarioId"  value="<?php echo $link1['idusuario']; ?>">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Usuario:</label> 
                            <input type="text" autofocus required="true" readonly="true" class="form-control form-group" name="inputUsuarioNombre" id="inputUsuarioNombre"  value="<?php echo $link1['usuarionombre']; ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Contraseña:</label> 
                            <input type="text" autofocus required="true" class="form-control form-group" name="inputUsuarioContasena" id="inputUsuarioContasena"  value="<?php echo $link1['usuariocontrasena']; ?>">
                        </div> 
                        <div class="form-group col-sm-4">
                            <label class="control-label">Cargo:</label> 
                            <input type="text" autofocus required="true" readonly="true" class="form-control form-group" name="inputUsuarioCargo" id="inputUsuarioCargo"  value="<?php echo $link1['rol']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Fecha de Registro:</label> 
                            <input type="datetime" autofocus required="true"  readonly="true" class="form-control form-group" name="inputUsuarioFecha" id="inputUsuarioFecha"  value="<?php echo $link1['usuariofechacreacion']; ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Status:</label> 
                            <input type="text" autofocus required="true"  readonly="true" class="form-control form-group" name="inputUsuarioStatus" id="inputUsuarioStatus"  value="<?php if($link1['usuarioactivo']==1){echo "Activo";}else{    echo "No Activo";}   ?>">
                        </div>                 
                    </div>
                       <?php } ?>
                </div>   
            </div>
        </div>

<?php
        
        
    }
}
?>

