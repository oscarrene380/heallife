<?PHP
// Iniciar sesi�n
session_start();

// Si se ha enviado el formulario
$usuario = $_REQUEST['dui'];
$clave = $_REQUEST['clave'];
if (isset($usuario) && isset($clave)) {
  // Comprobar que el usuario est� autorizado a entrar
  include "../modelos/conexion.php";

  $result = mysqli_query($con, "SELECT * FROM usuarios WHERE dui='" . $usuario . "' and clave='" . $clave . "'");
  $nfilas = mysqli_num_rows($result);

  // Los datos introducidos son correctos
  if ($nfilas > 0) {
    $row = mysqli_fetch_row($result);
      
    $id = $row[0]; //este es el nombre del usuario
    $dui = $row[1];
    $nombre = $row[2];
    $nombre2 = $row[3];
    $apellidos = $row[4];
    $nivel = $row[8];  
    

    $_SESSION["id"] = $id;
    $_SESSION["usuario_valido"] = $dui;
    $_SESSION["nombres"] = $nombre . " " . $nombre2;
    $_SESSION["apellidos"] = $apellidos;
    $_SESSION["nivel"] = $nivel;
    


    if ($nivel == 1) {      
      header("location:../vistas/admin/home.php");
      exit;
    }
    if ($nivel == 2) {
      header("location:../vistas/medicos/menuMedico.php");
      exit;
    }
    if ($nivel == 3) {
      header("location:../vistas/pacientes/menuPaciente.php");
    }
  } else {
    header("location:../../login.php?Invalid=Usuario o contraseña incorrectos");
  }
  include "../modelos/cerrar_conexion.php";

} else {
  header("location:../../login.php?Empty=Por favor llevar campos");
}
