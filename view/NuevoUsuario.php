<?php session_start(); 
if(isset($_SESSION['Admin']) && in_array( $_SESSION["ID"], array(1), true )){}else{ header("location:../index.php");}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="../img/favicon.ico">

    <title>H M N G | Alta de Nueva Credencial</title>

     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--<link href="../css/Propios.css" rel="stylesheet">-->
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
     <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>
    <script type="text/javascript" src="funcionesjs/GestionUsuarios.js"></script>
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
                    <span class="m-r-sm text-muted welcome-message">Bienvenido al Gestor de Sub-Almacen </span>
                </li>
                <li>
                    <a  href="../process/LogoutAdmin.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-6">
                    <h2><a href="Principal.php">Página Principal</a></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Estas aqui</a>
                        </li>
                        <li>
                            <a href="Usuarios.php">Gestion de Credenciales</a>
                        </li>
                        <li class="active">
                            <strong>Alta de Nueva Credencial</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        
                    </div>
                </div>
            </div>
           
            <div class="wrapper wrapper-content">
               <div class="row">
                    <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Formato de Registro de Credenciales</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                    <div class="col-sm-10 col-sm-offset-4">
                                         <label id="resultado"></label>
                                    </div>
                            </div>
                            <form role="form" class="form-horizontal"   id="CrearUsuario" name="CrearUsuario">
                                <div class="form-group"><label class="col-sm-2 control-label">Empleado</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="inputNombreEmpleado" autofocus name="inputNombreEmpleado" >
                                        
                                        <?php
                                            
                                             require_once '../funciones/funciones.php';
                                            $objListaEmpleados = new Listas();
                                            $listaEmpleados =  $objListaEmpleados ->ListaEmpleados();
                                            foreach ($listaEmpleados as $row => $valores) {
                                              echo '<option value="'.$valores['idempleado'].'">'.$valores['empleadonombre'].'</option>';
                                            }
                                        ?>
                                        </select>
                                    </div>
                                   
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre Usuario</label>
                                    <div class="col-sm-10"><input id="inputNombreUsuario" name="inputNombreUsuario"  placeholder="Nombre Usuario" autofocus required="true" type="text" class="form-control"></div>
                                    <label class="col-sm-2 control-label"></label><div class="col-sm-10"><span  id="estadousuario"></span></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Contraseña</label>
                                    <div class="col-sm-10"><input id="inputContraseñaUsuario" name="inputContraseñaUsuario"  placeholder="Contraseña" autofocus required="true" autocomplete="new-password" type="password" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Cargo en Sistema</label>
                                    
                                    <div class="col-sm-10">
                                        <select class="form-control" id="inputCargoUsuario" name="inputCargoUsuario">
                                        <?php
                                            require_once '../funciones/funciones.php';
                                            $objListaRoles = new Listas();
                                            $listaRoles = $objListaRoles ->ListaRoles();
                                            foreach ($listaRoles as $row => $valores) {
                                              echo '<option value="'.$valores['idrol'].'">'.$valores['rolnombre'].'</option>';
                                            }
                                        ?>
                                    </select></div>

                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Estado</label>
                                    <div class="col-sm-10"><select class="form-control" id="inputEstadoUsuario" name="inputEstadoUsuario" >
                                        <option value="1"> Activo </option>
                                        <option value="2"> Inactivo </option>
                                    </select></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button id="FormSubmit"  class="btn btn-primary" type="submit">Registrar</button>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                            </form>
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

   


</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Apr 2018 04:53:25 GMT -->
</html>
