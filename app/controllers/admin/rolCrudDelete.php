<?php

include "../../modelos/conexion.php";

$rol = $_POST['rol_d'];

if (isset($rol)) {
    $consulta = "UPDATE roles set id_estado='2' where id_rol = ' $rol '";
    mysqli_query($con, $consulta);

    header("location:../../vistas/admin/rolCrud.php?Exito=Registro eliminar correctamente!");
} else {
    header("location:../../vistas/admin/rolCrud.php?Error=No se completo accion como esperaba!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";