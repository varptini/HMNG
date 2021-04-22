<?php session_start(); 
if(isset($_SESSION['Admin']) && in_array( $_SESSION["ID"], array(1,2,3), true )){}else{ header("location:../index.php");}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="../img/favicon.ico">

    <title>H M N G | Gestion de Reportes </title>

     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/Propios.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/plugins/dataTables/datatables.min.js"></script>
    <!--<script src="../js/moment-with-locales.min.js"></script>-->
    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>
    <script type="text/javascript" src="funcionesjs/GestionCargos.js"></script>
    <script type="text/javascript" src="funcionesjs/GestionPerfil.js"></script>

</head>

<body class="fixed-sidebar fixed-nav fixed-nav-basic">

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
        <nav class="navbar navbar-fixed-top   " role="navigation" style="margin-bottom: 0">
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
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><a href="index.php">Página Principal</a></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Estas aqui</a>
                        </li>
                        <li class="active">
                            <strong>Gestion de Reportes</strong>
                        </li>
                    </ol>
                </div>
                
            </div>
           
            <div class="wrapper wrapper-content">
                <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins  ">
                    <div class="ibox-title">
                        <h5>Tabla de insumos proximos a Caducar</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
<!--                            <a class="" data-toggle="" href="NuevoRol.php">
                                <i class="fa fa-plus">  Agregar Cargos</i>
                            </a>
                            
                            -->
                        </div>
                    </div>
                    <div class="ibox-content"> 
                        <div class="table-responsive">
                            <table id="dt_InsumosCaducar" class="table table-striped table-bordered table-hover dt_InsumosCaducar" >
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
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tabla de insumos bajos en existencias</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
<!--                            <a class="" data-toggle="" href="NuevoRol.php">
                                <i class="fa fa-plus">  Agregar Cargos</i>
                            </a>
                            
                            -->
                        </div>
                    </div>
                    <div class="ibox-content"> 
                        <div class="table-responsive">
                            <table id="dt_ExistenciaBaja" class="table table-striped table-bordered table-hover dt_ExistenciaBaja" >
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
        $(document).ready(function(){
            
            $('.dt_InsumosCaducar').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Lista de insumos proximos a caducar'},
                    {extend: 'pdf', title: 'Lista de insumos proximos a caducar'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
        });
        $(document).ready(function(){
            
            $('.dt_ExistenciaBaja').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Lista de insumos proximos a agotarse'},
                    {extend: 'pdf', title: 'Lista de insumos proximos a agotarse'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
        });
//        moment.locale("es");     
//        console.log(moment().format("dddd, MMMM Do YYYY, h:mm:ss a"));
//        console.log(moment().subtract(10, 'days').calendar()); // 06/16/2019
//        console.log(moment().subtract(6, 'days').calendar());  // el jueves pasado a las 4:36 PM
//       console.log( moment().subtract(3, 'days').calendar());  // el domingo pasado a las 4:36 PM
//        console.log(moment().subtract(1, 'days').calendar());  // ayer a las 4:36 PM
//        console.log(moment().calendar());                      // hoy a las 4:36 PM
//        console.log(moment().add(1, 'days').calendar());       // mañana a las 4:36 PM
//        console.log(moment().add(3, 'days').calendar());       // sábado a las 4:36 PM
//        console.log(moment().add(10, 'days').calendar());     
    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Apr 2018 04:53:25 GMT -->
</html>
