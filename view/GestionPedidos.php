<?php session_start(); 
if(isset($_SESSION['Admin']) && !in_array( $_SESSION["ID"], array(2), true )){}else{ header("location:../index.php");}
?>
<!DOCTYPE html>  
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico">
    <title>H M N G | Gestion de Pedidos</title>

     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/footable.bootstrap.css" rel="stylesheet">
    <link href="../css/icheck.css" rel="stylesheet">
    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!--<script src="../js/plugins/footable/moment.min.js"></script>-->
    <script src="../js/plugins/footable/footable.js"></script>
    
    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>
    <script type="text/javascript" src="funcionesjs/GestionPedidos.js"></script>
    <script type="text/javascript" src="funcionesjs/GestionPerfil.js"></script>
    <style>
        input[type=checkbox]
        {
          /* Doble-tamaño Checkboxes */
          -ms-transform: scale(1.5); /* IE */
          -moz-transform: scale(1.5); /* FF */
          -webkit-transform: scale(1.5); /* Safari y Chrome */
          -o-transform: scale(1.5); /* Opera */
          padding: 10px;
        }

        /* Tal vez desee envolver un espacio alrededor de su texto de casilla de verificación */
        .checkboxtexto
        {
          /* Checkbox texto */
          font-size: 110%;
          display: inline;
        }
    </style>

</head>

<body class="fixed-sidebar fixed-sidebar fixed-nav fixed-nav-basic">

    <div id="wrapper">
 <?php include "modals/modalPerfil.php" ?>
     <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                            <span>
                            <img alt="image" style="min-height: 20px;max-height: 50px;" class="img-circle" src="../img/user.png" />
                            </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION["Admin"]; ?></strong>
                                </span> <span class="text-muted text-xs block"><?php echo $_SESSION["Rol"]; ?><b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a id="btn_VerPerfil"  class="btn_VerPerfil">Perfil <input type="text" value="<?php echo $_SESSION["IdEmpleado"]?>" hidden="true" id="IDEmpleadoPerfil"></a></li>
                            <li class="divider"></li>
                            <li><a  href="../process/LogoutAdmin.php">Cerrar Sesion</a></li>
                        </ul>
                    </div>
                    <div class="logo-element"><small>H M N G</small></div>
                </li>
                <?php if (  $_SESSION["ID"]==1 ) { ?>
                <li>
                    <a href="#"><i class="fa fa fa-user-md"></i> <span class="nav-label">Personal</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="Empleados.php">Empleados</a></li>
                        <li><a href="Roles.php">Cargos</a></li>
                        <li><a href="Usuarios.php">Credenciales</a></li>
                    </ul>
                </li>
                <?php }
                if ( in_array( $_SESSION["ID"], array(1), true ) ) { 
                ?>
                <li>
                    <a href="Almacen.php"><i class="fa fa-building"></i> <span class="nav-label">Almacenes</span></a>
                </li>
                <?php } 
                if ( in_array( $_SESSION["ID"], array(1,2), true ) ) { ?>
                <li>
                    <a href="Insumos.php"><i class="fa fa-medkit"></i> <span class="nav-label">Insumos</span>  </a>
                </li>
                <?php } 
                if ( !in_array( $_SESSION["ID"], array(2), true ) ) { ?>
                <li>
                    <a href="GestionPedidos.php"><i class="fa fa-dot-circle-o"></i> <span class="nav-label">Gestion Pedidos</span></a>
                </li> 
                <?php 
                }
                if(  $_SESSION["ID"]==1 ) { 
                ?>
                <li>
                    <a href="Servicios.php"><i class="fa fa-warning"></i> <span class="nav-label">Servicios</span></a>
                </li>
                <?php }
                if ( in_array( $_SESSION["ID"], array(1,2,3), true ) ) { 
                ?>
                <li>
                    <a href="Reportes.php"><i class="fa fa-pencil"></i> <span class="nav-label">Reportes</span></a>
                </li>
                <?php }
                if (  $_SESSION["ID"]==1 ){
                ?>
                
                <li>
                    <a href="Bitacoras.php"><i class="fa fa-bookmark"></i> <span class="nav-label">Bitacoras</span></span></a>
                </li>
                <li>
                    <a href="Archivos.php"><i class="fa fa-file-archive-o"></i> <span class="nav-label">Archivos</span></a>
                </li>
                <?php  } ?>
                
            </ul>
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-fixed-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
<!--                <form role="search" class="navbar-form-custom" action="#">
                    <div class="form-group">
                        <input type="text" placeholder="Buscar..." class="form-control" name="top-search" id="top-search">
                    </div>
                </form>-->
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Bienvenido al Gestor de Sub-Almacen</span>
                </li>
                <li>
                    <a  href="../process/LogoutAdmin.php">
                        <i class="fa fa-sign-out"></i> Cerrar Sesion
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading ">
                <div class="col-sm-4">
                    <h2><a href="index.php">Pagina Principal</a></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Estas aqui</a>
                        </li>
                        <li class="active">
                            <strong>Gestion de Pedidos</strong>
                        </li>
                    </ol>
                </div>
               
            </div>
           
            <div class="wrapper wrapper-content">

                <?php if (in_array( $_SESSION["ID"], array(1,3), true )){ 
                    include "modals/modalPedido.php";   
                }?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#GestionarPedidos" data-toggle="tab">Gestionar Pedidos</a></li>
                                         <?php  if ( in_array( $_SESSION["ID"], array(1,3), true ) ) { ?>
                                        <li><a href="#VerificarPedidos" data-toggle="tab">Verificar Pedidos</a></li>
                                         <?php } if ( in_array( $_SESSION["ID"], array(1,3), true ) ) { ?>
                                        <li><a href="#PedidosDespachados" data-toggle="tab">Pedidos Concluidos</a></li>
                                        <?php }  ?>
                                    </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="GestionarPedidos">
                                    <form role="form" name="formHacerPedido" id="formHacerPedido" class="form-horizontal">
                                        
                                        <div class="hr-line-dashed"></div>
                                        <div class="col-sm-12" id="ResultadoHacerPedido" ></div>  
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Nombre: </label>
                                            <div class="col-sm-4">
                                                <input  id="inputPedidoNombre" name="inputPedidoNombre"  value="<?php echo $_SESSION["Admin"]; ?>" autofocus required="true" readonly="true" type="text" class="form-control">
                                                <input hidden="true"  id="inputPedidoNombreID" name="inputPedidoNombreID"  value="<?php echo $_SESSION["IdEmpleado"]; ?>" type="text" >
                                            </div>
                                            <label class="col-sm-1 control-label">Servicio: </label>
                                            <div class="col-sm-4">
                                                <input  id="inputPedidoServicio" name="inputPedidoServicio"  value="<?php echo $_SESSION["Rol"]; ?>" autofocus required="true" readonly="true" type="text" class="form-control">
                                                <?php if(isset($_SESSION["Idservicio"])){ ?><input  hidden="true" id="inputPedidoServicioID" name="inputPedidoServicioID"  value="<?php echo $_SESSION["Idservicio"]; ?>"  type="number"><?php } ?>
                                            </div>
                                            <div class=" col-sm-2">
                                                <?php if(isset($_SESSION["Idservicio"])){ ?><button id="FormSubmit"  class="btn btn-primary" type="submit">Registrar</button><?php } ?>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="scroll">
                                            <table  class="TablaPedido footable table  table-hover table-condensed table-responsive " data-filtering="true">
                                                <thead>
                                                    <tr>    
                                                        <th data-toggle="true">Insumo</th>
<!--                                                        <th data-breakpoints="all" data-title="Nombre Generico">Nombre Generico</th>
                                                        <th data-breakpoints="all" data-title="Descripcion">Descripcion</th>-->
                                                        <th data-filterable="false">Unidad de Medida</th>
                                                        <th data-filterable="false">Existencia</th>
                                                        <th data-filterable="false">Cantidad requerida</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require_once '../funciones/funciones.php';
                                                    $objListaInsumos = new Listas();
                                                    $listaInsumos = $objListaInsumos ->ListaInsumos();
                                                    if(!empty($listaInsumos)){
                                                    foreach ($listaInsumos as $row => $link) {
                                                    ?>
                                                    <tr>
                                                        <td for> 
                                                            <label >
                                                            <input type='checkbox' id="Box<?php echo $link['idinsumos']; ?> " name='checkboxInsumos[]' value=<?php echo $link['idinsumos']; ?>  >
                                                            <span class="checkboxtexto"> <?php echo $link['insumosnombrecomercial']; ?></span>
                                                            </label>
                                                        </td>
                                                        <!--<td><?php // echo $link['insumosnombregenerico']; ?></td>-->
                                                        <!--<td><?php // echo $link['insumosdescripcion']; ?></td>-->
                                                        <td><?php echo $link['insumosunidadmedida']; ?></td>
                                                        <td><?php echo $link['insumosexistencia']; ?></td>
                                                        <td style="width: 150px;" ><input   disabled='disabled' name="Cantidad[]" min="1" max="<?php echo $link['insumosexistencia']; ?>"   autofocus required="true" type="number" class="form-control"></td>
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
                                        </div>
                                    </form>
                                    </div>
                                    <?php  if ( in_array( $_SESSION["ID"], array(1,3), true ) ) { ?>
                                    <div class="tab-pane fade" id="VerificarPedidos">
                                        
                                        <div class="hr-line-dashed"></div>
                                         
                                        <div  style="text-align:center;"><h2>Lista de Pedidos Realizados al Sistema</h2></div>
                                        <div class="hr-line-dashed"></div>
                                        <table  class="TablaPedido footable table table-hover table-condensed table-responsive table-striped " data-sorting="true" data-filtering="true">
                                            <thead>
                                                <tr>    
                                                    <th>Pedido</th>               
                                                    <th >Fecha Pedido</th>
                                                    <th data-title="Realizado Por:">Realizado Por:</th>
                                                    <th data-title="Servicio Destino">Servicio Destino</th>
                                                    <th >Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once '../funciones/funciones.php';
                                                $objListaPedidos = new Listas();
                                                $listaPedidos = $objListaPedidos ->ListaPedidosTemporales();
                                                if(!empty($listaPedidos)){
                                                foreach ($listaPedidos as $row => $link) {
                                                ?>
                                                <tr>
                                                    
                                                    <td class="idpedido" ><?php echo $link['idegresos']; ?></td>
                                                    <td data-direction="ASC"><?php echo $link['egresosfecharegistro']; ?></td>
                                                    <td><?php echo $link['empleado']; ?></td>
                                                    <td><?php echo $link['servicio']; ?></td>
                                                    <td>
                                                        <div class="input-group-btn ">
                                                        <button title="Ver" data-toggle="modal" data-target="#ModalMostrarPedido"class="bt_verPedido btn btn-warning btn-sm" type="button" ><i class="fa fa-eye"></i></button>
                                                        <button title="Autorizar" data-toggle="modal" data-target="#ModalAutorizarPedido"  class="bt_VerificarPedido btn btn-danger btn-sm" type="button" ><i class="fa fa-edit"></i></button>
                                                        </div>
                                                    </td>
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
                                    </div>
                                    <?php } if ( in_array( $_SESSION["ID"], array(1,3), true ) ) { ?>
                                    <div class="tab-pane fade" id="PedidosDespachados">
                                        <div class="hr-line-dashed"></div>
                                        <div class="col-sm-12" id="ResultadoPedidosDespachado" ></div>  
                                        <div  style="text-align:center;"><h2>Lista de Pedidos Concluidos</h2></div>
                                        <div class="hr-line-dashed"></div>
                                        
                                        <table  class="TablaPedido footable table  table-hover table-condensed table-responsive table-striped " data-paging="true" data-sorting="true" data-filtering="true">
                                            <thead>
                                                <tr>    
                                                    <th>Pedido</th>               
                                                    <th >Fecha Pedido</th>
                                                    <th data-title="Realizado Por:">Realizado Por:</th>
                                                    <th data-title="Servicio Destino">Servicio Destino</th>
                                                    <th >Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once '../funciones/funciones.php';
                                                $objListaPedidos = new Listas();
                                                $listaPedidos = $objListaPedidos ->ListaPedidos();
                                                if(!empty($listaPedidos)){
                                                foreach ($listaPedidos as $row => $link) {
                                                ?>
                                                <tr>
                                                    
                                                    <td class="idpedido" ><?php echo $link['idegresos']; ?></td>
                                                    <td ><?php echo $link['egresosfecharegistro']; ?></td>
                                                    <td><?php echo $link['empleado']; ?></td>
                                                    <td><?php echo $link['servicio']; ?></td>
                                                    <td >
                                                        <div class="input-group-btn ">
                                                        <button title="Ver" data-toggle="modal" data-target="#ModalMostrarPedidoConcluido"class="bt_verPedidoConcluido btn btn-warning btn-sm" type="button" ><i class="fa fa-eye"></i></button>
                                                        
                                                        </div>
                                                    </td>
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
                                        
                                    </div>
                                    <?php }  ?>
                                </div>
                            </div>
                        </div>
			
			
			
                    </div>
                </div>
                
            </div>
            <div class="footer">
                <div class="pull-right"></div>
                <div>
                    <strong>Copyright</strong> Varptini &copy; 2010-2018
                </div>
            </div>

        </div>
        </div>

    <script>
        
</script>


</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Apr 2018 04:53:25 GMT -->
</html>
