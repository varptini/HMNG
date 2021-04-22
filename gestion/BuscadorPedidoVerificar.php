<?php
require '../funciones/funciones.php';
$search="";

if(isset($_POST['inputBuscador'])){
    $search = trim($_POST['inputBuscador']);
}

$objbuscadorPedidoMostrar = new Listas();
$buscaPedidoMostrar = $objbuscadorPedidoMostrar ->BusquedaPedidoMostrar($search);
$buscaPedidoinsumosMostrar = $objbuscadorPedidoMostrar ->BusquedaPedidoinsumosMostrar($search);
if(!empty($buscaPedidoMostrar)){
    foreach ($buscaPedidoMostrar as $row => $link)
    { 
?>

        <div class="form-group">
            <label class="control-label">ID Pedido  </label>
            <span style="font-size:15px;" class='badge badge-primary'><?php echo $link['id']; ?></span>
            <input type="text" hidden="true" name="inputIdPedido" value="<?php echo $link['id']; ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Fecha de Pedido:  <strong class="text-success"><?php echo $link['fecha']; ?></strong></label><br>
            <label class="control-label">Realizado Por:  <strong class="text-success"><?php echo $link['empleado']; ?></strong></label><br>
            <label class="control-label">Servicio Requerido:  <strong class="text-success"> <?php echo $link['servicio']; ?></strong></label>
            
        </div>
        <ol>
        <?php
        foreach ($buscaPedidoinsumosMostrar as $row => $link)
        {
        ?>
            <li>Nombre:  <strong><?php echo $link['comercial']; ?></strong> 
                <ul>
                  <li>Nombre Generico:  <strong><?php echo $link['generico']; ?>
                      <input type="text" hidden="true" name="inputIdInsumo[]" value="<?php echo $link['insumoid']; ?>">
                  </strong></li>
                  <li>Descripcion:  <strong><?php echo $link['descripcion']; ?></strong></li>
                  <li>Cantidad Referida: <input type="number" class="input-sm" required="true" readonly="true"  ondblclick="this.readOnly='';" name="inputCantidadSurtida[]" min="1" value="<?php echo $link['cantidad']; ?>" ></li>
                </ul>
            </li>
            <div class="hr-line-dashed"></div>

<?php
        }
        echo"</ol>";
    }
}
?>

<!--onblur="this.readOnly='true';"-->