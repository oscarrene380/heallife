<?php

include "../../modelos/conexion.php";

$hora = $_POST['hora_d'];

if (isset($hora)) {
    $consulta = "UPDATE horas set id_estado='2' where id_hora = ' $hora '";
    mysqli_query($con, $consulta);

    header("location:../../vistas/admin/horasCrud.php?Exito=Registro eliminar correctamente!");
} else {
    header("location:../../vistas/admin/horasCrud.php?Error=No se completo accion como esperaba!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";