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

<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo" style="background-color: #40bcc4">
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
                <li class="active"><a href="../../controladores/logout.php?logout"><i class="fa fa-sign-out"></i>
                        <span>Cerrar Sesion</span></a></li>
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
                <p>
                    <?php echo '' . $row[2] . ' ' . $row[3]; ?>
                </p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU PRINCIPAL</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="home.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            <li><a href="citasCrud.php"><i class="fa fa-medkit"></i> <span>Citas</span></a></li>
            <li><a href="usuariosCrud.php"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
            <li><a href="medicosCrud.php"><i class="fa fa-user-md"></i> <span>Medicos</span></a></li>
            <li><a href="especialidadesCrud.php"><i class="fa fa-stethoscope"></i> <span>Especialidades</span></a></li>
            <li><a href="horaCrud.php"><i class="fa fa-clock-o"></i> <span>Horas Atencion</span></a></li>
            <li><a href="horarioCrud.php"><i class="fa fa-calendar-o"></i> <span>Horarios</span></a></li>
            <li><a href="rolesCrud.php"><i class="fa fa-users"></i> <span>Roles</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-bar-chart"></i> <span>Reportes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="reportEspecialidades.php"><i class="fa fa-reorder"></i>Citas por especialesdad</a></li>
                    <li><a href="reportMedicos.php"><i class="fa fa-reorder"></i>Citas por medicos</a></li>
                </ul>
            </li>
            <li><a href="profileAdmin.php"><i class="fa fa-gears"></i> <span>Perfil</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>