<?php
/*Llamamos la configuración de nuestra aplicación*/

require_once 'config.php';

/**
 * Clase de conexión a la base de datos
 */

class Conexion
{
    public $host;
    public $user;
    public $pwd;
    public $bd;
    public $con;

    /**
     * Inicializando las variables
     */

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->pwd = DB_PWD;
        $this->bd = DB_NAME;
    }

    public function conectar()
    {
        try {
            $this->con = mysqli_connect($this->host, $this->user, $this->pwd, $this->bd);

            if ($this->con)
                return $this->con;
            else
                throw new Exception('No fue posible conectarse a la base de datos');
        } catch (Exception $e) {
            echo '<h4>Error [ ' . $e->getMessage() . ' ]</h4>';
        }
    }

    public function desconectar()
    {
        try {
            if (!mysqli_close($this->con))
                throw new Exception('No fue posible conectarse a la base de datos');
        } catch (Exception $e) {
            echo '<h4>Error [ ' . $e->getMessage() . ' ]</h4>';
        }
    }
}
