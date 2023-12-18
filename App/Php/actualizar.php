<?php
    include('controlador.php');
    include('../../App/Config/config.php');

    $id = $_POST['Id'];
    // unlink ($_POST['Portada']);
    $dato = array($_POST['Materia'],$_POST['Libro'], $_POST['Autor'], $_POST['Stock'], $_POST['A_Edicion'], $_POST['Editorial'], $_POST['Portada']);

    
    // echo $URL."Public/File/Fisico/".$_POST['Portada'];

    $ins = new crud();
    $ins->conectar();
    $ins->actualizarDatos($id, $dato);

    header('Location:../../Layout/Admin/Altas.php');
?>
