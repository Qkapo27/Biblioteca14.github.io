<?php
    include('controlador.php');
    include('../Config/config.php');

    $id = $_REQUEST['Id'];

    $ins = new crud();
    $ins->eliminarDatos($id);
    
    

    header('Location:../../Layout/Admin/Altas.php');

?>