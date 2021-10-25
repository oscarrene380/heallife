<?php

include "../../modelos/conexion.php";

if (empty($_POST['duiE']) || empty($_POST['claveE'])) {
    header("location:../../vistas/admin/usuariosCrud.php?Vacio=No dejar campos vacios");
} else {
    $consulta = "UPDATE usuarios set dui='" . $_POST['duiE'] . "', nombre='" . $_POST['nombreE'] . "', segundonombre='" . $_POST['nombre2E'] . "', apellidos='" . $_POST['apellidoE'] . "', clave='" . $_POST['claveE'] . "', id_gen='" . $_POST['generoE'] . "', direccion='" . $_POST['direccionE'] . "', id_rol='" . $_POST['nivelE'] . "', correo='" . $_POST['correoE'] . "', id_estado='" . $_POST['estadoE'] . "' WHERE id_usu='" . $_POST['idE'] . "'";
    mysqli_query($con, $consulta);

    header("location:../../vistas/admin/usuariosCrud.php?Exito=Registro actualizado correctamente!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";
