<?php ob_start();
require '../funciones/funciones.php';
require_once '../dompdf/autoload.inc.php';
$search="";
$nombreEmpleado="";
if(isset($_POST['inputidPedidoVista'])){
    $search = trim($_POST['inputidPedidoVista']);
    $nombreEmpleado =$_POST['NombreEmpleadoVista']; 
   
    $objbuscadorPedidoMostrar = new Listas();
    $buscaPedidoMostrar = $objbuscadorPedidoMostrar ->BusquedaPedidoMostrar($search);
    $buscaPedidoinsumosMostrar = $objbuscadorPedidoMostrar ->BusquedaPedidoinsumosMostrar($search);
    if(!empty($buscaPedidoMostrar)){
        foreach ($buscaPedidoMostrar as $row => $link)
        {
            
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <!--<meta charset="utf-8">-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="../img/favicon.ico">
            <title>H M N G | Reporte <?php echo $link['id']; ?></title>
            
            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <link href="../css/propio.css" rel="stylesheet">
            <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
            <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
            <script src="../js/plugins/pace/pace.min.js"></script>

            
            
        </head>
        <body class="container boxed-layout">
            <div id="header">
                <table>
                  <tr>
                    <td>Pedido ID <?php echo $search; ?></td>
                    <!--<td style="text-align: right;">Despachado por:: <?php echo $nombreEmpleado; ?></td>-->
                  </tr>
                </table>
            </div>
            <div id="footer">
             <div class="page-number"></div>
            </div>
            <!-- BEGIN Content-->
            <div class="content app-content container-fluid">
                <div class="content-wrapper">
                    <!-- content header-->
                    <div class="content-header row  ">
                        <div style="text-align:center;"><img class="img-responsive" src="../img/Emcabezado2.png"  alt="Emcabezado2"/></div>
                        <div class="col-sm-12 " style="background: black; text-align:right;"><p><font color="white" ><h4>SALIDA DE MATERIAL DE CEYE &nbsp; &nbsp; (F-64-ENF-12)</h4></font></p></div>
                        <div class="form-group ">
                            <label for="">Servicio:<u><?php echo $link['servicio']; $servicioNombre=$link['servicio']; ?></u></label>
                            <label class="pull-right">Fecha:<u><?php echo $link['fecha']; ?></u></label>
                        </div>
                    </div>
                    <!-- content header-->
                        
                    <!-- content body-->
                    <div class="content-body">
                        
                            <table  class="TablaPedido table-bordered" style="width:100%;" >
                                <thead>
                                    <tr>
                                        <th style="text-align: center"><small >#</small></th>
                                        <th style="text-align: center"><small>Nombre de Articulos</small></th>               
                                        <th style="text-align: center"><small>Cantidad Solicitada</small></th>
                                        <th style="text-align: center"><small>Cantidad Surtida</small></th>
                                        <th style="text-align: center"><small>Unidad</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                        <?php
                        $contador=1;
                        foreach ($buscaPedidoinsumosMostrar as $row1 => $link1)
                        {
                        ?>        
                                
                                    <tr>
                                        <td><p style="font-size: 80%; text-align: center;margin-top: 0; margin-bottom: 0;  margin-left: 0;  margin-right: 0;"><?php echo $contador; ?></p></td>
                                        <td ><p style="font-size: 80%; margin-top: 0;  margin-bottom: 0;  margin-left: 0;  margin-right: 0;"><?php echo $link1['comercial']; ?> <a style="font-size: 50%; margin-top: 0;  margin-bottom: 0;  margin-left: 0;  margin-right: 0;" ><?php echo $link1['descripcion']; ?></a></p>
                                        </td>
                                        <td><p style="font-size: 80%; text-align: center; margin-top: 0;margin-bottom: 0;  margin-left: 0;  margin-right: 0;"><?php echo $link1['cantidad']; ?></p></td>
                                        <td></td>
                                        <td><p style="font-size: 80%; text-align: center; margin-top: 0;margin-bottom: 0;  margin-left: 0;  margin-right: 0;"><?php echo $link1['medida']; ?></p></td>
                                    </tr>
                                
                        <?php
                        $contador= $contador + 1; 
                        }
                        ?>        
                                </tbody>    
                                <tfoot>
                                </tfoot>
                            </table>
                        <br>
                        <div class="col-sm-12 ">
                            <div class="col-sm-3 pull-right" style="text-align: center;" >                         
                                <u>   &nbsp; &nbsp; <?php echo $link['empleado']; ?> &nbsp; &nbsp;</u>
                            </div>
                        </div>
                    </div>
                    <!-- content body-->
                    <footer>

                    </footer>
                </div>
            </div>
            <!-- END Content-->
            
                
      </body>
    </html>



<?php
        
        }
    }
    
    
}else{ header("location:../index.php");}
//
    use Dompdf\Dompdf;
    $dompdf = new DOMPDF();
    $dompdf->load_html(ob_get_clean());
    $dompdf->render();
    $pdf = $dompdf->output();
    $path = "archivos/userfiles/files/Pedidos";
    $filename="Pedido_".$servicioNombre."_ID_".$search.".pdf";
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/".$path."/".$filename, $pdf);
//    $dompdf->stream($filename);
    $dompdf->stream($filename, array("Attachment" => false));
    exit(0);
    
    
?>
