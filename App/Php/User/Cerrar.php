<?php
include '../../Config/config.php';

session_start();
if (isset($_SESSION['usuario_sesion'])) {
    session_destroy();
    echo 'cerrada';
    header('Location:'.$URL);
}

?>