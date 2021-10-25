<?php

include "../../modelos/conexion.php";

$usuario = $_POST['usuario'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$especialidad = $_POST['espe'];
$medico = $_POST['medico'];
$estado = $_POST['estado'];

if ($usuario == "") {
    header("location:../../vistas/pacientes/citasPaciente.php?Vacio=La hora fin no puede ser antes de la hora de inicio!");
} else {
    if (!($fecha == "")) {
        $consulta = "SELECT COUNT(id_usu) AS user FROM reservaciones WHERE fecha = ' $fecha ' AND id_hora = ' $hora ';";
        $ejecutar = mysqli_query($con, $consulta);
        $row = mysqli_fetch_array($ejecutar);
        if ($row['user'] > 0) {
            echo '<script>alert("INGRESE OTRO MEDICO")</script>';
            header("location:../../vistas/pacientes/citasPaciente.php?Error=Ya existe este usuario medico, intente otro!");
        } else {
            $consulta = "INSERT INTO reservaciones(id_usu, fecha, id_hora, id_espe, id_med, id_estado) values('$usuario', '$fecha', '$hora', '$especialidad', '$medico', '$estado');";
            $ejecutar = mysqli_query($con, $consulta);

            if ($ejecutar) {
                header("location:../../vistas/pacientes/citasPaciente.php?Exito=Tu registro fue exitoso!");
            } else {
                header("location:../../vistas/pacientes/citasPaciente.php?Error=No se puedo registrar en el sistema");
            }
        }
    } else {
        header("location:../../vistas/pacientes/citasPaciente.php?Vacio=Por favor escoja una fecha!");
    }
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";