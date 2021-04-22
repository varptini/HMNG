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
    <div class="form-group">
        <label class="control-label">Nombre Comercial</label>
        <input  id="inputInsumoNombreComercial" name="inputInsumoNombreComercial" value="<?php echo $link['insumosnombrecomercial']; ?>"  required="true" type="text" class="form-control">
        <label class="control-label">Nombre Generico</label>
        <input  id="inputInsumoNombreGenerico" name="inputInsumoNombreGenerico"  value="<?php echo $link['insumosnombregenerico']; ?>" required="true" type="text" class="form-control">
    </div>                               
    <div class="form-group">
        <label class="control-label">Descripcion</label>
        <textarea  name="inputInsumoDescripcion" id="inputInsumoDescripcion" rows="5" placeholder="Descripcion" cols="20" required="true" class="form-control" form="formModificarInsumo" ><?php echo $link['insumosdescripcion']; ?></textarea>
    </div>
    <div class="form-group">
        <label class="control-label">Unidad Medida</label>
            <select  class="form-control" id="selectInsumoUnidadMedida"  autofocus name="selectInsumoUnidadMedida" >
            <option value="<?php echo $link['insumosunidadmedida']; ?>"><?php echo $link['insumosunidadmedida']; ?></option>
            <option value="Pieza">Pieza</option>
            <option value="Caja">Caja</option>
            <option value="Sobre">Sobre</option>
            <option value="Litro">Litro</option>
            <option value="Galon">Galon</option>
            <option value="Bolsa">Bolsa</option>
            <option value="Paquete">Paquete</option>
            <option value="Frasco">Frasco</option>
            <option value="Kilogramo">Kilogramo</option>
            <option value="Miligramo">Miligramo</option>
            <option value="Kit (Conjunto de piezas)">Kit (Conjunto de piezas)</option>
            </select>
    </div>
    <div class="form-group">
        <label class="control-label">Cantidad Minima</label>
        <input   id="inputinsumoCantidadMinima" name="inputinsumoCantidadMinima"  value="<?php echo $link['insumoscantidadminima']; ?>" min="1" required="true" type="number" class="form-control">
        <label class="control-label">Almacen</label>
            <select class="form-control"  id="selectInsumoAlmacen"  autofocus name="selectInsumoAlmacen" >
                <?php
                 require_once '../funciones/funciones.php';
                $objListaAlmacen = new Listas();
                $listaAlmacen =  $objListaAlmacen ->ListaAlmacenes();
                foreach ($listaAlmacen as $row => $valores) {
                  echo '<option value="'.$valores['idalmacen'].'">'.$valores['almacennombre'].'</option>';
                }
            ?>
            </select>
    </div>
                                      
<?php
    }
}
?>