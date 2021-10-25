<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Fundeso | Medicos</title>
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
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-user-md"></i> <span>Add New User</span></a>
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
                                    <h3 class="box-title">Medicos Del Sistema</h3>
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
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Especialidad</th>
                                                <th>Hora Entrada</th>
                                                <th>Hora Salida</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "../../modelos/conexion.php";
                                            $result = mysqli_query($con, "SELECT me.id_med, me.id_usu, us.nombre, us.apellidos, me.id_espe, es.descripcion, me.id_horario, ho.horainicio, ho.horafin, me.id_estado, e.descripcion FROM `medicos` AS me
                                            INNER JOIN usuarios as us ON me.id_usu = us.id_usu
                                            INNER JOIN especialidades AS es ON me.id_espe = es.id_espe
                                            INNER JOIN horarios AS ho ON me.id_horario = ho.id_horario
                                            INNER join estado AS e on me.id_estado = e.id_estado WHERE me.id_estado = 1;");
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr id="<?php echo $row[0]; ?>">
                                                <td><?php echo $row[0] ?></td>
                                                <td hidden><?php echo $row[1]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td hidden><?php echo $row[4]; ?></td>
                                                <td><?php echo $row[5]; ?></td>
                                                <td hidden><?php echo $row[6]; ?></td>
                                                <td><?php echo $row[7]; ?></td> <!-- horarios 7 -->
                                                <td><?php echo $row[8]; ?></td>
                                                <td hidden><?php echo $row[9]; ?></td> <!-- estado 9-->
                                                <td><?php echo $row[10]; ?></td>
                                                <td>
                                                    <a href="#editEmployeeModal" class="btn btn-warning editbtn">
                                                        <i class="material-icons update fa fa-user-md"><span> Editar</span></i>
                                                    </a>
                                                    <a href="#deleteEmployeeModal" class="btn btn-danger deletebtn">
                                                        <i class="material-icons delete fa fa-user-md"><span> Eliminar</span></i>
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
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Especialidad</th>
                                            <th>Hora Entrada</th>
                                            <th>Hora Salida</th>
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
                            $dropbox = "SELECT * FROM usuarios WHERE id_rol = 2";
                            $dropbox2 = "SELECT * FROM especialidades";
                            $dropbox3 = "SELECT * FROM horarios";
                            $dropbox4 = "SELECT * FROM estado";
                            $llenar = mysqli_query($con, $dropbox);
                            $llenar2 = mysqli_query($con, $dropbox2);
                            $llenar3 = mysqli_query($con, $dropbox3);
                            $llenar4 = mysqli_query($con, $dropbox4);
                            ?>
                            <!-- Add Modal HTML -->
                            <div id="addEmployeeModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="user_form" action="../../controladores/admin/medicosCrudAdd.php" method="POST">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Agregar Medico</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group col-md-12">
                                                    <label>Usuario</label>
                                                    <select name="usuario" id="" class="form-control">
                                                        <?php while ($row1 = mysqli_fetch_array($llenar)) :; ?>
                                                        <option value="<?php echo $row1['id_usu']; ?>"><?php echo $row1['nombre'] . ' ' . $row1['apellidos']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Especialidad</label>
                                                    <select name="espe" id="" class="form-control">
                                                        <?php while ($row1 = mysqli_fetch_array($llenar2)) :; ?>
                                                        <option value="<?php echo $row1['id_espe']; ?>"><?php echo $row1['descripcion']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Horario</label>
                                                    <select name="horario" id="" class="form-control">
                                                        <?php while ($row1 = mysqli_fetch_array($llenar3)) :; ?>
                                                        <option value="<?php echo $row1['id_horario']; ?>"><?php echo $row1['horainicio'] . ' - ' . $row1['horafin']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Estado</label>
                                                    <select name="estado" id="" class="form-control">
                                                        <?php while ($row1 = mysqli_fetch_array($llenar4)) :; ?>
                                                        <option value="<?php echo $row1['id_estado']; ?>"><?php echo $row1['descripcion']; ?></option>
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
                                        <form id="update_form" action="../../controladores/admin/medicosCrudUpdate.php" method="POST">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Medico</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" id="m_id" name="idE" class="form-control" required>
                                                <div class="form-group col-md-12">
                                                    <label>Usuario</label>
                                                    <input type="hidden" id="u_tipo" name="niv" class="form-control" required>
                                                    <select name="usuarioE" id="usuario_m" class="form-control">
                                                        <?php
                                                        $query_med = mysqli_query($con, "SELECT * FROM usuarios WHERE id_rol = 2");
                                                        while ($rw = mysqli_fetch_array($query_med)) {
                                                        ?>
                                                        <option value="<?php echo $rw['id_usu']; ?>"><?php echo $rw['nombre'] . ' ' . $rw['apellidos']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Especialidad</label>
                                                    <input type="hidden" id="u_gen" name="gen" class="form-control" required>
                                                    <select name="espeE" id="espe_m" class="form-control">
                                                        <?php
                                                        $query_med2 = mysqli_query($con, "select * from especialidades");
                                                        while ($rw2 = mysqli_fetch_array($query_med2)) {
                                                        ?>
                                                        <option value="<?php echo $rw2['id_espe']; ?>"><?php echo $rw2['descripcion']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Horario</label>
                                                    <input type="hidden" id="u_gen" name="gen" class="form-control" required>
                                                    <select name="horarioE" id="horario_m" class="form-control">
                                                        <?php
                                                        $query_med3 = mysqli_query($con, "select * from horarios");
                                                        while ($rw3 = mysqli_fetch_array($query_med3)) {
                                                        ?>
                                                        <option value="<?php echo $rw3['id_horario']; ?>"><?php echo $rw3['horainicio'] . ' - ' . $rw3['horafin']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Estado</label>
                                                    <input type="hidden" id="u_estado" name="est" class="form-control" required>
                                                    <select name="estadoE" id="estado_m" class="form-control">
                                                        <?php
                                                        $query_med4 = mysqli_query($con, "select * from estado");
                                                        while ($rw4 = mysqli_fetch_array($query_med4)) {
                                                        ?>
                                                        <option value="<?php echo $rw4['id_estado']; ?>"><?php echo $rw4['descripcion']; ?></option>
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
                                        <form id="delete_form" action="../../controladores/admin/medicosCrudDelete.php" method="POST">
                                            <input type="hidden" name="update_id" id="update_id">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Borrar Medico</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" id="id_med" name="idD" class="form-control">
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
        $('#m_id').val(data[0]);
        $('#usuario_m').val(data[1]);
        $('#espe_m').val(data[4]);
        $('#horario_m').val(data[6]);
        $('#estado_m').val(data[9]);
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
        $('#id_med').val(data[0]);
        });
        });
        </script>
    </body>
</html>