<?php
// Inicio de las sesiones
session_start();

//Configuración de acceso a la base de datos
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PWD = '';
const DB_NAME = 'heallife';

//Rutas de la aplicación
define('APP', dirname(dirname(__FILE__)));

//Ruta de la URL
const URL = 'http://localhost/HealLife/';

const SITIO = 'Inventario';
