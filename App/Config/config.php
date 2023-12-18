<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','biblioteca');

// define('SERVIDOR','localhost');
// define('USUARIO','id21003629_colegio14');
// define('PASSWORD','C@legio14');
// define('BD','id21003629_biblioteca14');

$servidor = "mysql:dbname=".BD."; host=".SERVIDOR;

try {
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // echo "<script>alert(' conexion a la base de datos correcta')</script>";
} catch (PDOException $e) {
    echo "<script>alert('Error en la conexion a la base de datos')</script>";
}

//Localmente
$URL='http://localhost/Biblioteca/';
// $URL='https://bibliotec14.000webhostapp.com/'; 000host
?>