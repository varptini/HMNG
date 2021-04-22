<?php
require '../funciones/funciones.php';
$search="";

if(isset($_POST['CodBar'])){
    $search = $_POST['CodBar'];
}
$objbuscadroInsumo = new Listas();
$buscaInsumoCod = $objbuscadroInsumo ->BusquedaCodigoBar($search);
//print_r($buscaInsumoCod);
if(!empty($buscaInsumoCod)){
    foreach ($buscaInsumoCod as $row => $link){ 
        $id=$link['insumos_idinsumos'];
        $fecha=$link['insumos_descripcionfechacaducidad'];
//        $date = '2017-07-00';
        $date = date('Y-m ', strtotime($fecha));
//        echo trim($date);
//        $formato=strftime("%Y-%m", $fecha);
    }
    $objbuscadroInsumo = new Listas();
    $buscaInsumo = $objbuscadroInsumo ->BusquedaInsumo($id);
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
            <input  id="inputInsumoFechaCad" name="inputInsumoFechaCad" placeholder="Agrega Fecha de Caducidad" autofocus="true" readonly="true" required="true" type="month" value="<?php echo trim($date);; ?>" class="form-control">
        </div>                               
        <div class="form-group">
            <label class="control-label">Codigo de Barras</label>
            <input  id="inputInsumoCodBarras" name="inputInsumoCodBarras" autofocus="true" required="true" readonly="true" type="number" value="<?php echo $search ?>" class="form-control">
        </div>
<?php
        }
    }
}else
{
    echo "<h2>No se Encontro el codigo de barras en la base de datos </h2>";
}
?>