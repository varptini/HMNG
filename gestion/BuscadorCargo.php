<?php
require '../funciones/funciones.php';
$search="";

if(isset($_POST['inputBuscador'])){
    $search = $_POST['inputBuscador'];
}
$objbuscadroCargo = new Listas();
$buscaCargo = $objbuscadroCargo ->BusquedaCargo($search);
if(!empty($buscaCargo)){
    foreach ($buscaCargo as $row => $link)
    { 
?>
<input type="text"  id="inputIdCargo" name="inputIdCargo" hidden="true" value="<?php echo $link['idrol']; ?>" />
        <div class="form-group">
            <label class="control-label">Nombre del Cargo</label>
            <input id="inputNombreCargo" name="inputNombreCargo"  placeholder="Nombre del Cargo" autofocus required="true" value='<?php echo $link['rolnombre']; ?>' type="text" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">Descripcion del Cargo</label>
            <textarea id="textareaDescripcionCargo" name="textareaDescripcionCargo" placeholder="Descripcion" autofocus required="true"   class="form-control"  rows="5" cols="5"><?php echo $link['roldescripcion']; ?></textarea>
        </div>
<?php
    }
}
?>

