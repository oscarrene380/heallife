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

    public function login($user, $password)
    {
        $conexion = parent::conectar();
	    $conexion->set_charset('utf8');
        $query = "SELECT * FROM usuarios WHERE dui = $user and clave = $password";
        echo "SELECT * FROM usuarios WHERE dui = $user and clave = $password";
        $result = $conexion->query($query);
        $rows = $result->num_rows;
        
        if($rows > 0)
        {
            while ($field = $result->fetch_assoc())
            {
                $_SESSION['login'] = $field;
            }
            parent::desconectar();
            return true;
        }
        else
        {
            parent::desconectar();
            return false;
        }
    }
}
