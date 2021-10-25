<?php

include "../../modelos/conexion.php";

if (empty($_POST['horaiE']) || empty($_POST['horafE'])) {
    header("location:../../vistas/admin/horariosCrud.php?Vacio=No dejar campos vacios");
} else {
    $consulta = "UPDATE horarios set horainicio='" . $_POST['horaiE'] . "', horafin='" . $_POST['horafE'] . "', id_estado='" . $_POST['estadoE'] . "' WHERE id_horario='" . $_POST['idE'] . "'";
    mysqli_query($con, $consulta);

    header("location:../../vistas/admin/horariosCrud.php?Exito=Registro actualizado correctamente!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";
