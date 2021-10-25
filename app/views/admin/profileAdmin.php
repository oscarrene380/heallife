<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Fundeso | Perfil</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../../dist/img/favicon.png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Importar la barra de navegacion -->
            <?php require_once('menuAdmin.php'); ?>
            <!-- PHP para traer datos-->
            <?php
            include "../../modelos/conexion.php";
            $result = mysqli_query($con, "SELECT * FROM usuarios WHERE dui='" . $_SESSION['usuario_valido'] . "'");
            $row = mysqli_fetch_array($result);
            $idUsu = $row[0];
            $UsUsu = $row[1];
            $UsCla = $row[2];
            $UsRol = $row[3];
            $UsNom = $row[4];
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Perfil de Usuario
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <img class="profile-user-img img-responsive img-circle" src="../../../dist/img/avatar6.png" alt="User profile picture">
                                    <h3 class="profile-username text-center"><?php echo '' . $row[2] . ' ' . $row[3] . ' ' . $row[4]; ?></h3>
                                    <p class="text-muted text-center"><?php echo 'Usuario: ' . $row[1];; ?></p>
                                    <ul class="list-group list-group-unbordered">
                                        <!-- MENSAJES DE ACCIONES EN CRUD -->
                                        <?php
                                        if (@$_GET['Exito'] == true) {
                                        ?>
                                        <div class="alert alert-success text-center">
                                            <?php echo $_GET['Exito'] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (@$_GET['Error'] == true) {
                                        ?>
                                        <div class="alert alert-danger text-center">
                                            <?php echo $_GET['Error'] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (@$_GET['Vacio'] == true) {
                                        ?>
                                        <div class="alert alert-warning text-center">
                                            <?php echo $_GET['Vacio'] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <!-- /MENSAJES DE ACCIONES EN CRUD-->
                                    </ul>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Perfil</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" action="../../controladores/admin/profileEditAdmin.php" method="POST">
                                                <div class="form-group" style="visibility: hidden">
                                                    <label for="inputName" class="col-sm-2 control-label">ID</label>
                                                    <div class="col-sm-10" style="visibility: hidden">
                                                        <input type="text" name="id" class="form-control" id="inputName" placeholder="identificador" value='<?php echo '' . $row[0]; ?>' readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail" class="col-sm-2 control-label">Usuario</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="dui" class="form-control" id="inputEmail" placeholder="Dui" value='<?php echo '' . $row[1]; ?>' readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="nombre" class="form-control" id="inputName" placeholder="Nombre" value='<?php echo '' . $row[2];; ?>'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Segundo Nombre</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="nombre2" class="form-control" id="inputName" placeholder="Segundo Nombre" value='<?php echo '' . $row[3];; ?>'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Apellido</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="apellido" class="form-control" id="inputName" placeholder="Apellido" value='<?php echo '' . $row[4];; ?>'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Contraseña</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="clave" class="form-control" id="inputName" placeholder="Clave" value='<?php echo '' . $row[5]; ?>'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Correo</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="correo" class="form-control" id="inputName" placeholder="Correo" value='<?php echo '' . $row[9];; ?>'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Direccion</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="direccion" class="form-control" id="inputName" placeholder="Direccion" value='<?php echo '' . $row[7];; ?>'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-default">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.4.0
                    </div>
                    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
                    reserved.
                </footer>
                <!-- Control Sidebar -->
                <!-- /.control-sidebar -->
                <!-- Add the sidebar's background. This div must be placed
                immediately after the control sidebar -->
                <div class="control-sidebar-bg"></div>
            </div>
            <!-- ./wrapper -->
            <!-- jQuery 3 -->
            <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap 3.3.7 -->
            <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="../../../dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../../../dist/js/demo.js"></script>
        </body>
    </html>