<?php
require '../funciones/funciones.php';
$search="";

if(isset($_POST['inputBuscador'])){
    $search = $_POST['inputBuscador'];
}
$objbuscadroInsumo = new Listas();
$buscaInsumo = $objbuscadroInsumo ->BusquedaInsumo($search);
if(!empty($buscaInsumo)){
    foreach ($buscaInsumo as $row => $link)
    { 
?>

        <input  id="inputInsumoId" name="inputInsumoId" value="<?php echo $link['idinsumos']; ?>" hidden="true">
        <table class="table-responsive table-stroke">
            <tr>
                <td><strong>Nombre Comercial:<br></strong><div class="p-xxs bg-muted text-success"><?php echo $link['insumosnombrecomercial']; ?></div></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td> <strong>Nombre Generico: <br> </strong><div class="p-xxs bg-muted text-success"><?php echo $link['insumosnombregenerico']; ?></div></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td> <strong>Descripcion: <br> </strong><div class="p-xxs bg-muted text-success"><?php echo $link['insumosdescripcion']; ?> </div></td>
            </tr>
            <tr>
                <td><strong>Unidad Medida: <br> </strong><div class="p-xxs bg-muted text-success"><?php echo $link['insumosunidadmedida']; ?></div></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><strong>Cantidad Minima:<br>  </strong><div class="p-xxs bg-muted text-success"><?php echo $link['insumoscantidadminima']; ?></div></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><strong>Existencia:<br>  </strong><div class="p-xxs bg-muted text-success"><?php echo $link['insumosexistencia']; ?></div></td>
            </tr>
        </table>
        <div class="hr-line-solid"></div>
        <div class="form-group">
            <label class="control-label">Cantida a agregar</label>
            <input  id="inputinsumoCantidadAgregar" name="inputinsumoCantidadAgregar" placeholder="Agrega Cantidad a Agregar" autofocus="true" required="true" type="number" min="1" class="form-control">
            <label class="control-label">Fecha de Caducidad</label>
            <input  id="inputInsumoFechaCad" name="inputInsumoFechaCad" placeholder="Agrega Fecha de Caducidad" autofocus="true" required="true" type="month" class="form-control">
        </div>                               
        <div class="form-group">
            <label class="control-label">Codigo de Barras</label>
            <input  id="inputInsumoCodBarras" name="inputInsumoCodBarras" autofocus="true" required="true" type="number" class="form-control">
        </div>
<?php
    }
}
?>