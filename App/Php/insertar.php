<?php
    include('controlador.php');

    $key = array($_POST['Materia'],$_POST['Libro'], $_POST['Portada']);


    $ins = new crud();
    $ins->conectar();
    $ins->insertarDatos($key);

    header('Location:../../Layout/Admin/Altas.php');
?>