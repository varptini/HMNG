<?php
require '../funciones/funciones.php';
$search="";

if(isset($_POST['inputBuscador'])){
    $search = $_POST['inputBuscador'];
}
$objbuscadorServicio = new Listas();
$buscaServico = $objbuscadorServicio ->BusquedaServico($search);
if(!empty($buscaServico)){
    foreach ($buscaServico as $row => $link)
    { 
?>
<input type="text"  id="inputIdServicio" name="inputIdServicio" hidden="true" value="<?php echo $link['idservicios']; ?>" />
        <div class="form-group">
            <label class="control-label">Nombre del Servicio</label>
            <input id="inputNombreServicio" name="inputNombreServicio"  value="<?php echo $link['serviciosnombre']; ?>" required="true" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">Descripcion del Servicio</label>
            <textarea id="textareaDescripcionServicio" name="textareaDescripcionServicio"   required="true"   class="form-control"  rows="5" cols="5"><?php echo $link['serviciosdescripcion']; ?></textarea>
        </div>

<?php
    }
}
?>

