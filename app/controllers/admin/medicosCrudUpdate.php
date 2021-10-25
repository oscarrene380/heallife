<?php

include "../../modelos/conexion.php";

if (empty($_POST['usuarioE']) || empty($_POST['espeE']) || empty($_POST['horarioE'])) {
    header("location:../../vistas/admin/medicosCrud.php?Vacio=No dejar campos vacios");
} else {
    $consulta = "UPDATE medicos set id_usu='" . $_POST['usuarioE'] . "', id_espe='" . $_POST['espeE'] . "', id_horario='" . $_POST['horarioE'] . "', id_estado='" . $_POST['estadoE'] . "' WHERE id_med='" . $_POST['idE'] . "'";
    mysqli_query($con, $consulta);

    header("location:../../vistas/admin/medicosCrud.php?Exito=Registro actualizado correctamente!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";
