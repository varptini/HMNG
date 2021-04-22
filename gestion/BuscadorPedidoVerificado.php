<?php
require '../funciones/funciones.php';
$search="";

if(isset($_POST['inputBuscador'])){
    $search = trim($_POST['inputBuscador']);
}

$objbuscadorPedidoMostrar = new Listas();
$buscaPedidoMostrar = $objbuscadorPedidoMostrar ->BusquedaPedidoVerificado($search);
$buscaPedidoinsumosMostrar = $objbuscadorPedidoMostrar ->BusquedaPedidoinsumosVerificado($search);
if(!empty($buscaPedidoMostrar)){
    foreach ($buscaPedidoMostrar as $row => $link)
    { 
?>

        <div class="form-group">
            <label class="control-label">ID Pedido  </label>
            <span style="font-size:15px;" class='badge badge-primary'><?php echo $link['id']; ?></span>
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
                  <li>Nombre Generico:  <strong><?php echo $link['generico']; ?></strong></li>
                  <li>Descripcion:  <strong><?php echo $link['descripcion']; ?></strong></li>
                  <li>Cantidad Requerida:   <span class='badge badge-danger'><?php echo $link['cantidad']; ?></span> </li>
                </ul>
            </li>

<?php
        }
        echo"</ol>";
    }
}
?>

