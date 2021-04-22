<?php
require '../funciones/funciones.php';
$search="";

if(isset($_POST['inputBuscador'])){
    $search = $_POST['inputBuscador'];
}
$objbuscadroAlmacen = new Listas();
$buscaAlmacen = $objbuscadroAlmacen ->BusquedaAlmacen($search);
if(!empty($buscaAlmacen)){
    foreach ($buscaAlmacen as $row => $link)
    { 
?>
        <input type="text"  id="inputIdAlmacen" name="inputIdAlmacen" hidden="true" value="<?php echo $link['idalmacen']; ?>" />
        <div class="form-group"><label class="control-label">Nombre Alamacen</label>
            <input id="inputNombreAlmacen" name="inputNombreAlmacen"  required="true" value="<?php echo $link['almacennombre']; ?>" type="text" class="form-control">
        </div>
        <div class="form-group"><label class=" control-label">Direccion</label>
           <input id="inputDireccionAlmacen" name="inputDireccionAlmacen"   required="true" value="<?php echo $link['almacendireccion']; ?>" type="text" class="form-control">
        </div>
        <div class="form-group"><label class=" control-label">Telefono</label>
            <input id="inputTelefonoAlmacen" name="inputTelefonoAlmacen" required="true" value="<?php echo $link['almacentelefono']; ?>" type="tel" class="form-control">
        </div>
        <div class="form-group"><label class=" control-label">Correo electronico</label>
            <input id="inputEmailAlmacen" name="inputEmailAlmacen"   required="true" value="<?php echo $link['almacenemail']; ?>" type="email" class="form-control">
        </div>
        <div class="form-group"><label class=" control-label">Encargado</label>
            <input id="inputEncargadoAlmacen" name="inputEncargadoAlmacen"  required="true" value="<?php echo utf8_encode($link['almacenencargado']); ?>" type="text" class="form-control">
        </div>
<?php
    }
}
?>


                               