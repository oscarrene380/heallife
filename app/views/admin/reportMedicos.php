<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Fundeso | Reporte citas por medico</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../../dist/img/favicon.png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="../../../plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="../../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                
                                
                                
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="fecha" class="form-control pull-right" id="datepicker" placeholder="Buscar por fecha">
                                </div>
                                <!-- /.input group -->
                                
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <div class="btn-group pull-right">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-print"></i> <span> Imprimir</span></a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Reporte de citas por medicos</h3>
                                </div>
                                <!-- /.box-header -->
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
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Paciente</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Medico</th>
                                                <th>Estado</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "../../modelos/conexion.php";
                                            $result = mysqli_query($con, "SELECT re.id_res, re.id_usu, us.nombre, us.apellidos, fecha, re.id_hora, ho.hora, re.id_espe, es.descripcion, re.id_med, us2.nombre, us2.apellidos, re.id_estado, est.descripcion FROM `reservaciones` AS re
                                            INNER JOIN usuarios AS us ON re.id_usu = us.id_usu
                                            INNER JOIN horas as ho ON re.id_hora = ho.id_hora
                                            INNER JOIN especialidades AS es ON re.id_espe = es.id_espe
                                            INNER JOIN medicos AS me ON re.id_med = me.id_med
                                            INNER JOIN usuarios as us2 ON me.id_usu = us2.id_usu
                                            INNER JOIN estado AS est ON re.id_estado = est.id_estado WHERE re.id_estado = 1;");
                                            
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr id="<?php echo $row[0]; ?>">
                                                <td><?php echo $i; ?></td>
                                                
                                                <td><?php echo $row[2] . ' ' . $row[3]; ?></td>
                                                <td><?php echo $row[4]; ?></td>
                                                
                                                <td><?php echo $row[6]; ?></td>
                                                
                                                <td><?php echo $row[10] . ' ' . $row[11]; ?></td>
                                                
                                                <td><?php echo $row[13]; ?></td>
                                            </tr>
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Paciente</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Medico</th>
                                            <th>Estado</th>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>102</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                            
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
                <strong>Copyright &copy; 2021 <a href="#">Heallife</a>.</strong> All rights
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
        <!-- DataTables -->
        <script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../../../dist/js/adminlte.min.js"></script>
        <!-- date-range-picker -->
        <script src="../../../bower_components/moment/min/moment.min.js"></script>
        <script src="../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap datepicker -->
        <script src="../../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- bootstrap color picker -->
        <script src="../../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../../dist/js/demo.js"></script>
        <!-- page script -->
        <script>
        $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
        });
        });
        </script>
        <script>
        $(document).ready(function() {
        $('.editbtn').on('click', function() {
        $('#editEmployeeModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
        return $(this).text();
        }).get();
        console.log(data);
        $('#ci_id').val(data[0]);
        $('#usu').val(data[1]);
        $('#datepickerE').val(data[3]);
        $('#hora').val(data[4]);
        $('#espe_ci').val(data[6]);
        $('#med_ci').val(data[8]);
        $('#estado_ho').val(data[10]);
        });
        });
        </script>
        <script>
        $(document).ready(function() {
        $('.deletebtn').on('click', function() {
        $('#deleteEmployeeModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
        return $(this).text();
        }).get();
        console.log(data);
        $('#id_ho').val(data[0]);
        });
        });
        </script>
        <script>
        //Date picker
        $('#datepicker').datepicker({
        autoclose: true
        })
        $('#datepickerE').datepicker({
        autoclose: true
        })
        </script>
    </body>
</html>