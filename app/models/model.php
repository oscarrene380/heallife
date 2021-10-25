<?php
require_once APP . '/config/conexion.php';

class Modelo extends Conexion
{
    public function execute_query($query)
    {
        $conexion = parent::conectar();
        $conexion->set_charset('utf8');
        $resultado = $conexion->query($query);

        if ($resultado)
            return true;
        else
            return false;

        parent::desconectar();
    }
}
