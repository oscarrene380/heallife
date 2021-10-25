<?php

    include "../../modelos/conexion.php";

    if(empty($_POST['dui']) || empty($_POST['clave'])){
        header("location:../../vistas/medicos/profileMedico.php?Vacio=Por favor no deje campos en blanco!");
    }else{
        $consulta = "UPDATE usuarios set dui='" . $_POST['dui'] . "', nombre='" . $_POST['nombre'] . "', segundonombre='" . $_POST['nombre2'] . "', apellidos='" . $_POST['apellido'] . "', clave='" . $_POST['clave'] . "', correo='" . $_POST['correo'] . "', direccion='" . $_POST['direccion'] . "' WHERE id_usu='" . $_POST['id'] . "'";
        mysqli_query($con, $consulta);
    
        header("location:../../vistas/medicos/profileMedico.php?Exito=Se modifico su perfil exitosamente!");
    }
 
   

    @mysqli_free_result($ejecutar);
    include "../../modelos/cerrar_conexion.php";


