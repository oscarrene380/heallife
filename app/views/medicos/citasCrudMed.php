<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fundeso | Reservaciones</title>
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

<?php
session_start();
if (isset($_SESSION['usuario_valido'])) {
} else {
  header("location:../../../login.php");
}
?>

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
    <div class="wrapper">
        <header class="main-header">

            <!-- Logo -->
            <a href="index2.html" class="logo" style="background-color: #40bcc4">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>F</b>+</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>FUNDESO</b>+</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation" style="background-color: #40bcc4">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">


                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <!-- The user image in the navbar-->
                        <li class="active"><a href="../../controladores/logout.php?logout"><i class="fa fa-sign-out"></i> <span>Cerrar Sesion</span></a></li>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        </a>

                        </li>
                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../../dist/img/avatar6.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php
                            echo '' . $row[2] . ' ' . $row[3];
                            ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU PRINCIPAL</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active"><a href="menuMedico.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
                    <li><a href="citasCrudMed.php"><i class="fa fa-medkit"></i> <span>Citas</span></a></li>
                    <li><a href="profileMedico.php"><i class="fa fa-gears"></i> <span>Perfil</span></a></li>

                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- PHP para traer datos-->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <li class="fa fa-search"></li>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar por Dui">
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <div class="btn-group pull-right">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-medkit"></i> <span>Agregar Horario</span></a>
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
                                <h3 class="box-title">Listado De Citas</h3>
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
                                            <th>Id</th>
                                            <th>Paciente</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Especialidad</th>
                                            <th>Medico</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
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
                                            INNER JOIN estado AS est ON re.id_estado = est.id_estado WHERE re.id_estado = 1 ORDER BY id_res ASC;");
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr id="<?php echo $row[0]; ?>">
                                                <td><?php echo $row[0]; ?></td>
                                                <td hidden><?php echo $row[1]; ?></td>
                                                <td><?php echo $row[2] . ' ' . $row[3]; ?></td>
                                                <td><?php echo $row[4]; ?></td>
                                                <td hidden><?php echo $row[5]; ?></td>
                                                <td><?php echo $row[6]; ?></td>
                                                <td hidden><?php echo $row[7]; ?></td>
                                                <td><?php echo $row[8]; ?></td>
                                                <td hidden><?php echo $row[9]; ?></td>
                                                <td><?php echo $row[10] . ' ' . $row[11]; ?></td>
                                                <td hidden><?php echo $row[12]; ?></td>
                                                <td><?php echo $row[13]; ?></td>
                                                <td>
                                                    <a href="#editEmployeeModal" class="btn btn-warning editbtn">
                                                        <i class="material-icons update fa fa-medkit"><span> Editar</span></i>
                                                    </a>
                                                    <a href="#deleteEmployeeModal" class="btn btn-danger deletebtn">
                                                        <i class="material-icons delete fa fa-medkit"><span> Eliminar</span></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Paciente</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Especialidad</th>
                                            <th>Medico</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <?php
                        $dropbox = "SELECT * FROM usuarios WHERE id_rol = 3";
                        $dropbox2 = "SELECT * FROM horas";
                        $dropbox3 = "SELECT * FROM especialidades";
                        $dropbox4 = "SELECT * FROM medicos INNER JOIN usuarios ON medicos.id_usu = usuarios.id_usu";
                        $dropbox5 = "SELECT * FROM estado";
                        $llenar = mysqli_query($con, $dropbox);
                        $llenar2 = mysqli_query($con, $dropbox2);
                        $llenar3 = mysqli_query($con, $dropbox3);
                        $llenar4 = mysqli_query($con, $dropbox4);
                        $llenar5 = mysqli_query($con, $dropbox5);
                        ?>
                        <!-- Add Modal HTML -->
                        <div id="addEmployeeModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form id="user_form" action="../../controladores/medicos/citasCrudMedAdd.php" method="POST">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Agendar Cita</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group col-md-12">
                                                <label>Paciente</label>
                                                <select name="usuario" id="" class="form-control">
                                                    <?php while ($row1 = mysqli_fetch_array($llenar)) :; ?>
                                                        <option value="<?php echo $row1['id_usu']; ?>"><?php echo $row1['nombre'] . ' ' . $row1['apellidos']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Fecha</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" name="fecha" class="form-control pull-right" id="datepicker">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Hora</label>
                                                <select name="hora" id="" class="form-control">
                                                    <?php while ($row2 = mysqli_fetch_array($llenar2)) :; ?>
                                                        <option value="<?php echo $row2['id_hora']; ?>"><?php echo $row2['hora']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Especialidad</label>
                                                <select name="espe" id="" class="form-control">
                                                    <?php while ($row3 = mysqli_fetch_array($llenar3)) :; ?>
                                                        <option value="<?php echo $row3['id_espe']; ?>"><?php echo $row3['descripcion']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Medico</label>
                                                <select name="medico" id="" class="form-control">
                                                    <?php while ($row4 = mysqli_fetch_array($llenar4)) :; ?>
                                                        <option value="<?php echo $row4['id_med']; ?>"><?php echo $row4['nombre'] . ' ' . $row4['apellidos']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Estado</label>
                                                <select name="estado" id="" class="form-control">
                                                    <?php while ($row5 = mysqli_fetch_array($llenar5)) :; ?>
                                                        <option value="<?php echo $row5['id_estado']; ?>"><?php echo $row5['descripcion']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                            <input type="submit" class="btn btn-success" value="Agregar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Modal HTML -->
                        <div id="editEmployeeModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form id="update_form" action="../../controladores/medicos/citasCrudMedUpdate.php" method="POST">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Editar Cita</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="ci_id" name="idE" class="form-control" required>
                                            <div class="form-group col-md-12">
                                                <label>Usuario</label>
                                                <input type="hidden" id="usu_ci" name="est" class="form-control" required>
                                                <select name="usuarioE" id="usu" class="form-control">
                                                    <?php
                                                    $query_med = mysqli_query($con, "select * from usuarios");
                                                    while ($rw = mysqli_fetch_array($query_med)) {
                                                    ?>
                                                        <option value="<?php echo $rw['id_usu']; ?>"><?php echo $rw['nombre'] . ' ' . $rw['apellidos']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Fecha</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" name="fechaE" class="form-control pull-right" id="datepickerE">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Hora</label>
                                                <input type="hidden" id="hor" name="est" class="form-control" required>
                                                <select name="horaE" id="hora" class="form-control">
                                                    <?php
                                                    $query_med = mysqli_query($con, "select * from horas");
                                                    while ($rw = mysqli_fetch_array($query_med)) {
                                                    ?>
                                                        <option value="<?php echo $rw['id_hora']; ?>"><?php echo $rw['hora']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Especialidad</label>
                                                <input type="hidden" id="u_estado" name="est" class="form-control" required>
                                                <select name="espeE" id="espe_ci" class="form-control">
                                                    <?php
                                                    $query_med3 = mysqli_query($con, "select * from especialidades");
                                                    while ($rw3 = mysqli_fetch_array($query_med3)) {
                                                    ?>
                                                        <option value="<?php echo $rw3['id_espe']; ?>"><?php echo $rw3['descripcion']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Medico</label>
                                                <input type="hidden" id="u_estado" name="est" class="form-control" required>
                                                <select name="medE" id="med_ci" class="form-control">
                                                    <?php
                                                    $query_med3 = mysqli_query($con, "SELECT * FROM medicos INNER JOIN usuarios ON medicos.id_usu = usuarios.id_usu");
                                                    while ($rw3 = mysqli_fetch_array($query_med3)) {
                                                    ?>
                                                        <option value="<?php echo $rw3['id_med']; ?>"><?php echo $rw3['nombre'] . ' ' . $rw3['apellidos']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Estado</label>
                                                <input type="hidden" id="u_estado" name="est" class="form-control" required>
                                                <select name="estadoE" id="estado_ho" class="form-control">
                                                    <?php
                                                    $query_med3 = mysqli_query($con, "select * from estado");
                                                    while ($rw3 = mysqli_fetch_array($query_med3)) {
                                                    ?>
                                                        <option value="<?php echo $rw3['id_estado']; ?>"><?php echo $rw3['descripcion']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                            <input type="submit" class="btn btn-info" value="Actualizar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal HTML -->
                        <div id="deleteEmployeeModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form id="delete_form" action="../../controladores/medicos/citasCrudMedDelete.php" method="POST">
                                        <input type="hidden" name="update_id" id="update_id">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Eliminar Cita</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" id="id_ho" name="idD" class="form-control">
                                            <p>Esta seguro que quiere eliminar este registro?</p>
                                            <p class="text-warning"><small>Esta accion podria no ser deshecha.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" value="3" name="type">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
            format: 'yyyy-m-d' ,autoclose: true
        })
        $('#datepickerE').datepicker({
            format: 'yyyy-m-d', autoclose: true
        })
    </script>
</body>

</html>