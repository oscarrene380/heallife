<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fundeso | Horas</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../../dist/img/favicon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../../plugins/timepicker/bootstrap-timepicker.min.css">
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
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-user"></i> <span>Nueva Hora</span></a>
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
                  <h3 class="box-title">Registros De Horas</h3>
                </div>
                <!-- /.box-header -->
                <!-- MENSAJES DE ACCIONES EN CRUD -->
                <?php
                if (@$_GET['Exito'] == true) {
                ?>
                <div id="caja" class="alert alert-success text-center"><?php echo $_GET['Exito'] ?></div>
                <?php
                }
                ?>
                <?php
                if (@$_GET['Error'] == true) {
                ?>
                <div class="alert alert-danger text-center"><?php echo $_GET['Error'] ?></div>
                <?php
                }
                ?>
                <?php
                if (@$_GET['Vacio'] == true) {
                ?>
                <div class="alert alert-danger text-center"><?php echo $_GET['Vacio'] ?></div>
                <?php
                }
                ?>
                <!-- /MENSAJES DE ACCIONES EN CRUD-->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Horas</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../../modelos/conexion.php";
                      $result = mysqli_query($con, "SELECT h.id_hora, h.hora, h.id_estado, e.descripcion FROM `horas` as h INNER JOIN estado as e on h.id_estado = e.id_estado;");
                      $i = 1;
                      while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr id="<?php echo $row[0]; ?>">
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td hidden><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td>
                          <a href="#editEmployeeModal" class="btn btn-warning editbtn">
                            <i class="material-icons update fa fa-user"><span> Editar</span></i>
                          </a>
                          <a href="#deleteEmployeeModal" class="btn btn-danger deletebtn">
                            <i class="material-icons delete fa fa-user"><span> Eliminar</span></i>
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
                      <th>Horas</th>
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
              
              $dropbox = "SELECT * FROM estado";
              $llenar = mysqli_query($con, $dropbox);
              ?>
              <!-- Add Modal HTML -->
              <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form id="user_form" action="../../controladores/admin/horasCrudAdd.php" method="POST">
                      <div class="modal-header">
                        <h4 class="modal-title">Agregar Horas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="modal-body">
                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                          <div class="form-group col-md-12">
                            <label>Horas</label>
                            <div class="input-group">
                              <input type="text" name = "hora" class="form-control timepicker">
                              
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                        
                        
                        <div class="form-group col-md-12">
                          <label>Estado</label>
                          <select name="estado" id="" class="form-control">
                            <?php while ($row1 = mysqli_fetch_array($llenar)) :; ?>
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
                    <form id="update_form" action="../../controladores/admin/horasCrudUpdate.php" method="POST">
                      <div class="modal-header">
                        <h4 class="modal-title">Editar Horas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="modal-body">
                        <input type="text" id="r_id" name="idE" class="form-control" required>
                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                          <div class="form-group col-md-12">
                            <label>Horas</label>
                            <div class="input-group">
                              <input type="text" id = "r_hora" name = "horaE" class="form-control timepicker">
                              
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                        <div class="form-group col-md-12">
                          <label>Estado</label>
                          <input type="hidden" id="r_estado" name="est" class="form-control" required>
                          <select name="estadoE" id="estado_r" class="form-control">
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
                    <form id="delete_form" action="../../controladores/admin/horasCrudDelete.php" method="POST">
                      <input type="hidden" name="update_id" id="update_id">
                      <div class="modal-header">
                        <h4 class="modal-title">Elimiar Roles</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" id="id_d" name="hora_d" class="form-control">
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
    <!-- bootstrap time picker -->
    <script src="../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
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
    <!--
    Funcion JScrip para editar.
    activa el modal para edición.
    -->
    <script>
    $(document).ready(function() {
    $('.editbtn').on('click', function() {
    $('#editEmployeeModal').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
    return $(this).text();
    }).get();
    console.log(data);
    $('#r_id').val(data[0]);
    $('#r_hora').val(data[1]);
    $('#estado_r').val(data[2]);
    
    
    });
    });
    </script>
    <!--
    Funcion JScrip para Eliminar.
    activa el modal para edición.
    -->
    <script>
    $(document).ready(function() {
    $('.deletebtn').on('click', function() {
    $('#deleteEmployeeModal').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
    return $(this).text();
    }).get();
    console.log(data);
    $('#id_d').val(data[0]);
    });
    });
    </script>
    <!--
    Funcion JScrip para timepicker.
    activa la funcion de ingreso de horas.
    -->
    <script>
    //Timepicker
    $('.timepicker').timepicker({
    showInputs: false
    })
    </script>
    
  </body>
</html>