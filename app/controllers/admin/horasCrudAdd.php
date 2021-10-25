<?php

include "../../modelos/conexion.php";

if (isset($_POST['hora'])) {

    $hora = $_POST['hora'];
    $estado = $_POST['estado']; 

    if ($hora == "") {        
        header("location:../../vistas/admin/horasCrud.php?Vacio=Por favor llenar campos");
    } else {
        if (isset($hora)) {
            $consulta = "SELECT COUNT(hora) as h FROM horas WHERE hora='" . $hora . "'";
            $ejecutar = mysqli_query($con, $consulta);
            $row = mysqli_fetch_array($ejecutar);
            if ($row['h'] > 0) {
                echo '<script>alert("INGRESE OTRA HORA A ASIGNAR")</script>';
                header("location:../../vistas/admin/horasCrud.php?Error=Ya existe esta hora registrado, intente otra!");
            } else {
                $consulta = "INSERT INTO horas(hora, id_estado) values('$hora', '$estado');";
                $ejecutar = mysqli_query($con, $consulta);

                if ($ejecutar) {
                    header("location:../../vistas/admin/horasCrud.php?Exito=Tu registro fue exitoso!");
                } else {
                    header("location:../../vistas/admin/horasCrud.php?Error=No se puedo registrar en el sistema");
                }
            }
        }else{
            header("location:../../vistas/admin/horasCrud.php");
        }
    }
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";