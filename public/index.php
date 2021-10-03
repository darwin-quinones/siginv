<?php
define('BASEPATH', true);
/**
 * se define la zona horaria del sistema
 */
date_default_timezone_set('America/Bogota');

/**
 * nivel de errores 
 */
//error_reporting(ERROR_REPORTING_LEVEL);// POR CORREGIR QUITAR EL COMENTARIO PARA MIRAR EL ERROR
session_start();
/**
 * autoload de las clases en la carpeta librearie
 */
require_once '../app/autoload.php';

/**
 * Instanciamos la clase controlador
 */ 
$iniciar = new Core;