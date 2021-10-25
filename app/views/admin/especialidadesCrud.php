<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fundeso | Especialidades</title>
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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="row">
            <div class="col-md-3">
              <!--div class="input-group">
              <div class="input-group-addon">
                <li class="fa fa-search"></li>
              </div>
              <input type="text" class="form-control" placeholder="Buscar por Dui">
            </div-->
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3"></div>
          <div class="col-md-1"></div>
          <div class="col-md-2">
            <div class="btn-group pull-right">
              <a href="#addEspecialidad" data-toggle="modal" class="btn btn-success"><i class="fa fa-user"></i> <span>Agregar especialidad</span></a>
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
                <h3 class="box-title">Lista de especialidades</h3>
              </div>
              <!-- /.box-header -->
              <!-- /MENSAJES DE ACCIONES EN CRUD-->
              <div class="box-body">
                <table id="tblespecialidades" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Especialidad</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "../../modelos/conexion.php";
                    $result = mysqli_query($con, "SELECT * FROM especialidades WHERE id_estado = 1");
                    while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                      <td><?php echo $row[0]; ?></td>
                      <td><?php echo$row[1]; ?></td>
                      <td><?php echo $row[2] == 1? 'activo': 'inactivo'; ?></td>
                      <td>
                        <a class="btn btn-warning editbtn"> 
                          <i class="material-icons update fa fa-user editbtn"> Editar</i>
                        </a>
                        <a class="btn btn-danger deletebtn" data-id="<?= $row[0]; ?>">
                          <i class="material-icons delete fa fa-user deletebtn" data-id="<?= $row[0]; ?>"> Eliminar</i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Especialidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- Add Modal HTML -->
            <div id="addEspecialidad" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form id="frmAddEspecialidad">
                    <div class="modal-header">
                      <h4 class="modal-title">Agregar especialidad</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group col-md-12">
                        <label>Nombre de la especialidad</label>
                        <input type="text" id="especialidad" name="especialidad" class="form-control" required>
                      </div>
                      <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Agregar">
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Edit Modal HTML -->
              <div id="editEspecialidadModal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form id="frmEditEspecialidad" method="POST">
                    <div class="modal-header">
                      <h4 class="modal-title">Editar Especialidad</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label>ID de la especialidad</label>
                          <input type="text" id="editidespecialidad" name="editidespecialidad" class="form-control" required readonly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label>Nombre de la especialidad</label>
                          <input type="text" id="editespecialidad" name="editespecialidad" class="form-control" required >
                        </div>
                      </div>
                      <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Guardar cambios">
                      </div>
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
    <!-- Alerts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- page script -->
    <script>
    $("#tblespecialidades").DataTable({
      "responsive": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "language":
      {
        "emptyTable": "No hay datos disponibles en la tabla.",
        "info": "Del _START_ al _END_ de _TOTAL_ ",
        "infoEmpty": "Mostrando 0 registros de un total de 0.",
        "infoFiltered": "(filtrados de un total de _MAX_ registros)",
        "infoPostFix": " ",
        "lengthMenu": "Mostrar &nbsp; _MENU_",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "Dato para buscar",
        "zeroRecords": "No se han encontrado coincidencias.",
        "paginate":
        {
          "first": "Primera",
          "last": "Última",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "aria":
        {
          "sortAscending": "Ordenación ascendente",
          "sortDescending": "Ordenación descendente"
        }
      },
      "lengthMenu": [[1, 3, 5, 10, 15, 25, 50, -1], [1, 3, 5, 10, 15, 25, 50, "Todos"]],
      "iDisplayLength": 10
    });

    $(".dataTables_filter").addClass("d-none");
    document.querySelector('body').addEventListener('click', async (event) => {
      // Preguntar y enviar peticion para eliminar registro
      if (event.target.classList.contains('deletebtn'))
      {
        let row1 = event.target.parentNode.closest('tr');
        var especialidadmsg = row1.children[1].innerHTML;
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger mr-3",
          },
          buttonsStyling: false,
        });
        swalWithBootstrapButtons.fire({
          title: "Confirmar",
          text: `¿Esta seguro de eliminar la especialidad: ${especialidadmsg}?`,
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "Si, eliminar",
          cancelButtonText: "No, cancelar",
          reverseButtons: true,
        })
        .then(async(result) => {
          if (result.value) {
            let formdata = new FormData();
            formdata.append('idespecialidad', event.target.dataset.id);
            const searchParams = new URLSearchParams();
            for (const pair of formdata) {
              searchParams.append(pair[0], pair[1]);
            }
            let url = 'http://localhost/sistemacitasmedicas/sistema_medico/aplication/controladores/admin/especialidadesCrud.php';
            const response = await fetch(url, {
              method: 'DELETE',
              body: searchParams,
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
              }
            });
            let data = await response.json();
            if(data.success){
              Swal.fire({ title: "Exito!", text: data.success, type: "success", icon: "success", timer: 1000 });
            }
            if(data.error){
              Swal.fire({ icon: 'error', title: 'Error', text: data.error, footer: '<a href="#" target="_blank">Contactar con soporte técnico</a>' });
            }
            setTimeout(function(){ location.reload(); }, 1000);
          }
        });
      }

      // Abrir y cargar datos en modal de editar
      if (event.target.classList.contains('editbtn')){
        let row = event.target.parentNode.closest('tr');
        document.getElementById('editidespecialidad').value = row.children[0].innerHTML;
        document.getElementById('editespecialidad').value = row.children[1].innerHTML;
        $("#editEspecialidadModal").modal('show');
      }
    });

    // enviar peticion para guardar registro
    let frmAddEspecialidad = document.getElementById('frmAddEspecialidad');
    frmAddEspecialidad.addEventListener('submit', async (event) => {
      event.preventDefault();
      let form = new FormData(frmAddEspecialidad);
      let url = 'http://localhost/sistemacitasmedicas/sistema_medico/aplication/controladores/admin/especialidadesCrud.php';
      const response = await fetch(url, {
        method: 'POST',
        body: form
      });
      let data = await response.json();
      if(data.success){
        Swal.fire({ title: "Exito!", text: data.success, type: "success", icon: "success", timer: 1000 });
      }
      if(data.error){
        Swal.fire({ icon: 'error', title: 'Error', text: data.error, footer: '<a href="#" target="_blank">Contactar con soporte técnico</a>' });
      }
      setTimeout(function(){ location.reload(); }, 1000);
    });

    // enviar peticion para actualizar registro
    let  frmEditEspecialidad = document.getElementById('frmEditEspecialidad');
    frmEditEspecialidad.addEventListener('submit', async(event) => {
      event.preventDefault();
      let url = 'http://localhost/sistemacitasmedicas/sistema_medico/aplication/controladores/admin/especialidadesCrud.php';
      let formdata = new FormData(frmEditEspecialidad);
      const searchParams = new URLSearchParams();
      for (const pair of formdata) {
        searchParams.append(pair[0], pair[1]);
      }
      const response = await fetch(url, {
        method: 'PUT',
        body: searchParams,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        }
      });
      let data = await response.json();
      if(data.success){
        Swal.fire({ title: "Exito!", text: data.success, type: "success", icon: "success", timer: 1000 });
      }
      if(data.error){
        Swal.fire({ icon: 'error', title: 'Error', text: data.error, footer: '<a href="#" target="_blank">Contactar con soporte técnico</a>' });
      }
      setTimeout(function(){ location.reload(); }, 1000);
    });

    </script>
  </body>
</html>