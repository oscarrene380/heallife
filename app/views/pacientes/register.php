<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fundeso | Registro</title>
  <link rel="shortcut icon" type="image/x-icon" href="../../../dist/img/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page" style="background-color: #40bcc4">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../../../preespecializacion/index.html"><b>FUNDESO</b>+</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Registrase en Sistema</p>

      <?php
      if (@$_GET['Error'] == true) {
      ?>
        <div class="alert alert-danger text-center"><?php echo $_GET['Error'] ?></div>
      <?php
      }
      ?>

      <?php
      if (@$_GET['Exito'] == true) {
      ?>
        <div class="alert alert-success text-center"><?php echo $_GET['Exito'] ?></div>
      <?php
      }
      ?>

      <?php
      if (@$_GET['Warning'] == true) {
      ?>
        <div class="alert alert-warning text-center"><?php echo $_GET['Warning'] ?></div>
      <?php
      }
      ?>

      <?php
      if (@$_GET['Vacio'] == true) {
      ?>
        <div class="alert alert-warning text-center"><?php echo $_GET['Vacio'] ?></div>
      <?php
      }
      ?>

      <?php
      if (@$_GET['Noigual'] == true) {
      ?>
        <div class="alert alert-danger text-center"><?php echo $_GET['Noigual'] ?></div>
      <?php
      }
      ?>
      <?php
      include "../../modelos/conexion.php";

      $dropbox = "SELECT * FROM generos";

      $llenar = mysqli_query($con, $dropbox);
      ?>

      <form action="../../controladores/registerProcess.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="dui" class="form-control" placeholder="Dui">
          <span class="glyphicon glyphicon glyphicon-credit-card form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="nombre" class="form-control" placeholder="Nombre">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="nombre2" class="form-control" placeholder="Segundo Nombre">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="apellido" class="form-control" placeholder="Apellido">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="clave" class="form-control" placeholder="Contraseña">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="confirmar" class="form-control" placeholder="confirmar contraseña">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <select name="ugenero" id="ugenero" class="form-control">
            <?php while ($row1 = mysqli_fetch_array($llenar)) :; ?>
              <option value="<?php echo $row1['id_gen']; ?>"><?php echo $row1['descripcion']; ?></option>
            <?php endwhile; ?>
          </select>

        </div>
        <div class="form-group has-feedback">
          <input type="text" name="direccion" class="form-control" placeholder="Direccion">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="correo" class="form-control" placeholder="Correo">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>


        <div class="row">
          <div class="col-xs-8">

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" name="Registrar" class="btn btn-primary btn-block btn-flat bg-green">Registrate</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="../../../login.php" class="text-center">Ya cuento con una cuenta</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../../../plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>