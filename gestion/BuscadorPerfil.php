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
    
        <div class="hr-line-solid"></div>        
        <div class="form-group">
            <label class="control-label">Nombre:  </label>
            <span style="font-size:15px;" class='badge badge-primary'><?php echo $link['empleadonombre']; ?></span>
            <input type="text" hidden="true" value="<?php echo $link['idempleado']; ?>" class="idPerfilEmpleado">
        </div>
        <div class="hr-line-solid"></div>
        <h4 style="text-align: center; background-color: beige;">Datos Personales</h4>
        <div class="form-group">
            <table class="table table-responsive">                        
                <tbody>
                    <tr>
                        <td><label class="control-label">Direccion:  <strong class="text-success"><?php echo $link['empleadodireccion']; ?></strong></label></td>
                        <td><label class="control-label">Telefono:   <strong class="text-success"><a href="tel:<?php echo $link['empleadotelefono']; ?>"><?php echo $link['empleadotelefono']; ?></a></strong></label></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Correo:   <strong class="text-success"><a href="mailto:<?php echo $link['empleadocorreo']; ?>"> <?php echo $link['empleadocorreo']; ?></a></strong></label></td>
                        <td><label class="control-label">Celular:   <strong class="text-success"> <?php echo $link['empleadocelular']; ?></strong></label></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Fecha de Nacimiento:  <strong class="text-success"> <?php echo $link['empleadofechanacimiento']; ?></strong></label></td>
                        <td></td>
                    </tr>
                </tbody>
            </table> 
        </div>
        <div class="hr-line-solid"></div>
        <h4 style="text-align: center; background-color: beige;">Cuenta de Usuario</h4>
        <div class="form-group">
            <table class="table table-responsive">  
            <?php    foreach ($buscadorUsuarioMostrar as $row1 => $link1)
              { 
            ?>    
                <tbody>
                    <tr>
                        <td><label class="control-label">Usuario:   <strong class="text-success"><?php echo $link1['usuarionombre']; ?></strong></label></td>
                        <td><label class="control-label">Contraseña:   <strong class="text-success"><?php echo $link1['usuariocontrasena']; ?></strong></label></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Cargo:   <strong class="text-success"><?php echo $link1['rol']; ?></strong></label></td>
                        <td><label class="control-label">Fecha de Registro:   <strong class="text-success"> <?php echo $link1['usuariofechacreacion']; ?></strong></label></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Status:  <strong class="text-success"> <?php if($link1['usuarioactivo']==1){echo "<span class='badge badge-primary'>Activo</span>";}else{    echo "<span class='badge badge-danger'>No Activo</span>";}  ?></strong></label></td>
                        <td></td>
                    </tr>
                </tbody>
               <?php } ?>
            </table> 
        </div>
        <div class="hr-line-solid"></div>

<?php
        
        
    }
}
?>

