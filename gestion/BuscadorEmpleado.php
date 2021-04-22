<?php
require '../funciones/funciones.php';
$search="";

if(isset($_POST['inputBuscador'])){
    $search = $_POST['inputBuscador'];
}
$objbuscadroEmpleado = new Listas();
$buscaEmpleado = $objbuscadroEmpleado ->BusquedaEmpleado($search);
if(!empty($buscaEmpleado)){
    foreach ($buscaEmpleado as $row => $link)
    { 
?>
        <input type="text"  id="inputId" name="inputIdEmpleado" hidden="true" value="<?php echo $link['idempleado']; ?>">
        <div class="form-group">
            <label class="control-label">Nombre</label>
            <input id="inputNombreEmpleado" name="inputNombreEmpleado" readonly="true" placeholder="Nombre" value="<?php echo $link['empleadonombre']; ?>" autofocus required="true" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label class=" control-label">Direccion</label>
            <input id="inputDireccionEmpleado" name="inputDireccionEmpleado" value="<?php echo $link['empleadodireccion']; ?>"  placeholder="Direccion" autofocus required="true" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label class="control-label">Telefono</label>
            <input id="inputTelefonoEmpleado" name="inputTelefonoEmpleado"  value="<?php echo $link['empleadotelefono']; ?>" placeholder="Telefono" autofocus required="true" type="tel" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">Correo electronico</label>
            <input id="inputEmailEmpleado" name="inputEmailEmpleado"  value="<?php echo $link['empleadocorreo']; ?>" placeholder="Correo electronico" autofocus required="true" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label class=" control-label">Celular</label>
            <input id="inputCelularEmpleado" name="inputCelularEmpleado"  value="<?php echo $link['empleadocelular']; ?>" placeholder="Celular" autofocus required="true" type="tel" class="form-control">
        </div>
        <div class="form-group">
            <label class=" control-label">Fecha Nacimiento</label>
            <input id="inputfechaNacEmpleado" name="inputfechaNacEmpleado" readonly="true" value="<?php echo $link['empleadofechanacimiento']; ?>" placeholder="Fecha de Nacimiento" autofocus required="true" type="date" class="form-control">
        </div>
        
<?php
    }
}
?>