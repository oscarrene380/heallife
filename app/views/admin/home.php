<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fundeso | Inicio</title>
  <link rel="shortcut icon" type="image/x-icon" href="../../../dist/img/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">

  <!--Morris js para graficos-->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Importar la barra de navegacion -->
    <?php require_once('menuAdmin.php'); ?>
    <!-- PHP para traer datos-->
    <?php
    include "../../modelos/conexion.php";
    $result = mysqli_query($con, "SELECT * FROM usuarios WHERE dui='" . $_SESSION['usuario_valido'] . "'");
    $row = mysqli_fetch_array($result);
    
    $citas = mysqli_query($con, "SELECT COUNT(*) AS nu FROM reservaciones");
    $row4 = mysqli_fetch_array($citas);
    
    $pacientes = mysqli_query($con, "SELECT COUNT(*) AS nu FROM usuarios WHERE id_rol = 3");
    $row1 = mysqli_fetch_array($pacientes);
    
    $medico = mysqli_query($con, "SELECT COUNT(*) AS nu FROM medicos");
    $row2 = mysqli_fetch_array($medico);
    
    $espe = mysqli_query($con, "SELECT COUNT(*) AS nu FROM especialidades");
    $row3 = mysqli_fetch_array($espe);
    
    $primerdiaUTS = mktime(0, 0, 0, date("m"), 1, date("Y"));
    $ultimodiaUTS = mktime(0, 0, 0, date("m"), date('t'), date("Y"));
    
    $primerdia = date("Y-m-d", $primerdiaUTS);
    $ultimodia = date("Y-m-d", $ultimodiaUTS);
    
    $citasmes = mysqli_query($con, "SELECT COUNT(*) AS nu FROM reservaciones WHERE fecha BETWEEN '$primerdia' AND '$ultimodia'");
    $row5 = mysqli_fetch_array($citasmes);
    
    $idUsu = $row[0];
    $UsUsu = $row[1];
    $UsCla = $row[2];
    $UsRol = $row[3];
    $UsNom = $row[4];
    
    //Declaramos la sentencia sql que traera los datos para los charts
    $query = "SELECT COUNT(id_res) AS total, CAST(MONTHNAME(fecha) AS CHAR(3)) AS mes FROM `reservaciones` GROUP BY MONTH(fecha) ORDER BY MONTH(fecha) ASC;";
    $result = mysqli_query($con, $query);
    $chart_data = '';
    //variable de prueba para ver numero de citas
    $mes = "septiembre";
    while ($linea = mysqli_fetch_array($result)) {
      //declaramos el arreglo que lleva los meses y el total de citas que corresponde a cada mes
      $chart_data .= "{ year:'" . $linea[1] . "', citas:'" . $linea[0] . "'},";
    }
    $chart_data = substr($chart_data, 0, -1);
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Panel de Control
          <small>Administrador</small>
        </h1>
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->


        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Reporte de Citas Médicas <?php echo date('Y'); ?></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Citas Médicas <?php echo date('Y'); ?></strong>

                    </p>
                    <div id="chart" class="chart" style="height:380px">

                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box bg-purple">
                      <span class="info-box-icon"><i class="fa fa-medkit"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Citas totales</span>
                        <span class="info-box-number"><?php echo $row4['nu'] ?></span>
                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          Citas del mes: <?php echo $row5['nu'] ?>
                        </span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    <div class="info-box bg-green">
                      <span class="info-box-icon"><i class="fa fa-users"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Pacientes</span>
                        <span class="info-box-number"></span>
                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          Total de pacientes: <?php echo $row1['nu'] ?>
                        </span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    <div class="info-box bg-aqua">
                      <span class="info-box-icon"><i class="fa fa-user-md"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Médicos </span>
                        <span class="info-box-number"></span>
                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          Total de médicos: <?php echo $row2['nu'] ?>
                        </span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    <div class="info-box bg-yellow">
                      <span class="info-box-icon"><i class="fa fa-stethoscope"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Consultorios</span>
                        <span class="info-box-number"></span>
                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          Total de especialidades: <?php echo $row3['nu'] ?>
                        </span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- ./box-body -->
              <div class="box-footer">

              </div><!-- /.box-footer -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Últimas 10 Citas</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Paciente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../../modelos/conexion.php";
                      $result = mysqli_query($con, "SELECT re.id_res, re.id_usu, us.nombre, us.segundonombre, us.apellidos, fecha, re.id_hora, ho.hora, re.id_espe, es.descripcion, re.id_med, us2.nombre, us2.apellidos, re.id_estado, est.descripcion FROM `reservaciones` AS re
                                        INNER JOIN usuarios AS us ON re.id_usu = us.id_usu
                                        INNER JOIN horas as ho ON re.id_hora = ho.id_hora
                                        INNER JOIN especialidades AS es ON re.id_espe = es.id_espe
                                        INNER JOIN medicos AS me ON re.id_med = me.id_med
                                        INNER JOIN usuarios as us2 ON me.id_usu = us2.id_usu
                                        INNER JOIN estado AS est ON re.id_estado = est.id_estado ORDER BY id_res DESC LIMIT 10;");
                      $i = 1;
                      while ($row = mysqli_fetch_array($result)) {
                      ?>
                        <tr id="<?php echo $row[0]; ?>">
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row[2] . ' ' . $row[3] . ' ' . $row[4]; ?></td>
                          <td><?php echo $row[5]; ?></td>
                          <td><?php echo $row[7]; ?></td>
                        </tr>
                      <?php
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div><!-- /.table-responsive -->
              </div><!-- /.box-body -->
              <div class="box-footer clearfix">

                <a href="citasCrud.php" class="btn btn-sm btn-default btn-flat pull-right">Ver todas las citas</a>
              </div><!-- /.box-footer -->
            </div><!-- /.box -->
          </div><!-- /.col -->


          <div class="col-md-4">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Últimos 10 Usuarios</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Usuarios</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../../modelos/conexion.php";
                      $result = mysqli_query($con, "SELECT us.id_usu as id, us.dui, us.clave, us.nombre, us.segundonombre, us.apellidos, ge.descripcion, us.id_gen, ro.descripcion, us.id_rol, es.descripcion, us.id_estado, us.direccion, us.correo FROM `usuarios` AS us 
                    INNER JOIN roles AS ro ON us.id_rol = ro.id_rol
                    INNER JOIN generos AS ge ON us.id_gen = ge.id_gen
                    INNER JOIN estado AS es ON us.id_estado = es.id_estado ORDER BY id_usu DESC LIMIT 10;");
                      $i = 1;
                      while ($row = mysqli_fetch_array($result)) {
                      ?>
                        <tr id="<?php echo $row[0]; ?>">
                          <td><?php echo $row[1] ?></td>
                          <td><?php echo $row[3] . ' ' . $row[4] . ' ' . $row[5]; ?></td>

                        </tr>
                      <?php
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div><!-- /.table-responsive -->
              </div><!-- /.box-body -->
              <div class="box-footer clearfix">

                <a href="usuariosCrud.php" class="btn btn-sm btn-default btn-flat pull-right">Ver todos los usuarios</a>
              </div><!-- /.box-footer -->
            </div><!-- /.box -->
          </div><!-- /.col -->


        </div><!-- /.row -->
      </section><!-- /.content -->
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2021 <a href="#">Heallife</a>.</strong> All rights reserved.
    </footer>
    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
  <!-- REQUIRED JS SCRIPTS -->
  <!-- jQuery 3 -->
  <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../dist/js/adminlte.min.js"></script>
  <!-- Optionally, you can add Slimscroll and FastClick plugins.
    Both of these plugins are recommended to enhance the
    user experience. -->
</body>

</html>

<script>
  Morris.Bar({
    element: 'chart',
    data: [<?php echo $chart_data; ?>],
    xkey: 'year',
    ykeys: ['citas'],
    labels: ['citas'],
    hideHover: 'auto',
    stacked: true
  });
</script>