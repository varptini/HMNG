<?php session_start();if(isset($_SESSION['Admin'])){header("location: view/index.php");}else{ }?>
<!DOCTYPE html>
<html> 


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Apr 2018 04:51:24 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">

    <title>H M N G | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="process/Process_Login.js"></script>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"> <img src="img/HMNG.png" alt="Logo-HMNG" style="min-height: 50px;max-height: 185px;" ></h1>

            </div>
            <p></p>
            <form class="m-t" role="form" action="process/LoginAdmin.php" method="post" id="loginForm" name="loginForm">
                <div class="form-group">
                    <input class="form-control" id="usuario" name="usuario" type="text" placeholder="Usuario" autofocus required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" id="clave" name="clave" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            
            <p class="m-t"> <small>Creado con base en Bootstrap 3 &copy; 2014</small> </p>
        </div>
        <div  id="respuesta"></div>
    </div>   
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Apr 2018 04:51:24 GMT -->
</html>
