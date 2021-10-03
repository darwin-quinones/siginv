<?php
////////////////////////////////////
// Leemos el archivo de configuración
////////////////////////////////////
$Config = parse_ini_file('config.ini', true);

////////////////////////////////////
// Conexion a la base de datos
////////////////////////////////////
define('DB_HOST', $Config['database']['host']);
define('DB_USERNAME', $Config['database']['username']);
define('DB_PASSWORD', $Config['database']['password']);
define('DB_SCHEMA', $Config['database']['schema']);
/////////////////////////////////////
// Ruta de la aplicacion
/////////////////////////////////////
define('RUTA_SISINV',dirname(dirname(__FILE__)) . "/");

////////////////////////////////////
// Ruta de la URL
// Ejemplo http://localhost/nombreapp
////////////////////////////////////
define('URL_SISINV', $Config['application']['route']);
//////////////////////////////////////
// Valores configuracion
/////////////////////////////////////
//error_reporting(0);

define('ERROR_REPORTING_LEVEL', -1);

/////////////////////////////////////
// Datos del Sitio
/////////////////////////////////////
define('NAME_SISINV', $Config['application']['name']);
define('VERSION_SISINV', $Config['application']['version']);
