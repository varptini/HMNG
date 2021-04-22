<table class="table  dt_ExistenciaBaja" >
                                <thead>
                                <tr>
                                    
                                    <th>Nombre Comercial</th>
                                    <th>Nombre Generico</th>
                                    <th>Descripcion</th>
                                    <th>Existencia</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once '../funciones/funciones.php';
                                        $objListaAgotar = new Listas();
                                        $listaAgotar = $objListaAgotar ->ListaInsumosExistenciaBaja();                                        if(!empty($listaAgotar)){
                                        foreach ($listaAgotar as $row => $link) {
                                        ?>
                                        <tr>
                                            <td><?php echo $link['insumosnombrecomercial']; ?></td>
                                            <td><?php echo $link['insumosnombregenerico']; ?></td>
                                            <td><?php echo $link['insumosdescripcion']; ?></td>
                                            <td><?php echo $link['insumosexistencia']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    }else{
                                        echo '<tr><td colspan="8">No existen datos a mostrar </td></tr>';
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table> 
                              



<table class="table dt_InsumosCaducar" >
                                <thead>
                                <tr>
                                    <th>Codigo Barras</th>
                                    <th>Nombre Comercial</th>
                                    <th>Descripcion</th>
                                    <th>Fecha de Registro</th>
                                    <th>Fecha Caducidad</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once '../funciones/funciones.php';
                                        $objListaACaducar = new Listas();
                                        $listaACaducar = $objListaACaducar ->ListaInsumosCaducar();
                                        if(!empty($listaACaducar)){
                                        foreach ($listaACaducar as $row => $link) {
                                        ?>
                                        <tr>
                                            <td><?php echo $link['insumos_descripcioncodigobarras']; ?></td>
                                            <td><?php echo $link['insumosnombrecomercial']; ?></td>
                                            <td><?php echo $link['insumosdescripcion']; ?></td>
                                            <td ><?php echo $link['insumos_descripcionfecharegistro']; ?></td>
                                            <td><?php echo $link['insumos_descripcionfechacaducidad']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    }else{
                                        echo '<tr><td colspan="8">No existen datos a mostrar </td></tr>';
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>