<?php
include "../modelos/conexion.php";
if (isset($_POST['dui'])) {

    $dui = $_POST['dui'];
    $nombre = $_POST['nombre'];
    $nombre2 = $_POST['nombre2'];
    $apellidos = $_POST['apellido'];
    $clave = $_POST['clave'];
    $confirmar = $_POST['confirmar'];
    $genero = $_POST['ugenero'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $nivel = 3;
    $estado = 1;

    if ($dui == "") {
        echo '<script>alert("DEBE INGRESAR UN NOMBRE DE USUARIO.")</script>';
        header("location:../vistas/pacientes/register.php?Vacio=Por favor llenar campos");
    } else {
        if ($clave == $confirmar) {
            $consulta = "SELECT COUNT(dui) as user FROM usuarios WHERE dui='" . $dui . "'";
            $ejecutar = mysqli_query($con, $consulta);
            $row = mysqli_fetch_array($ejecutar);
            if ($row['user'] > 0) {
                echo '<script>alert("INGRESE OTRO NOMBRE DE USUARIO")</script>';
                header("location:../vistas/pacientes/register.php?Error=Ya existe este usuario con este DUI, intente otro!");
            } else {
                $consulta = "INSERT INTO usuarios(dui, nombre, segundonombre, apellidos, clave, id_gen, direccion, id_rol, correo, id_estado) values('$dui', '$nombre', '$nombre2', '$apellidos', '$clave', '$genero', '$direccion', '$nivel', '$correo', '$estado');";
                $ejecutar = mysqli_query($con, $consulta);

                if ($ejecutar) {
                    header("location:../vistas/pacientes/register.php?Exito=Tu registro fue exitoso!");
                } else {
                    header("location:../vistas/pacientes/register.php?Warning=No se puedo registrar en el sistema");
                }
            }
        }else{
            header("location:../vistas/pacientes/register.php?Noigual=Contraseña no coincide");
        }
    }
}
@mysqli_free_result($ejecutar);
include "../modelos/conexion.php";

