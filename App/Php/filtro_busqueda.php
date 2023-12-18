<?php
include('../../App/Config/config.php');
include('../../App/Php/controlador.php');

$art_x_pag = 20;
$paginaActual = isset($_POST['pagina']) ? $_POST['pagina'] : 1;
$iniciar = ($paginaActual - 1) * $art_x_pag;

$search = isset($_POST['search']) ? $_POST['search'] : '';

$sql_articulos = 'SELECT * FROM Inventario WHERE Materia LIKE :search OR Libro LIKE :search LIMIT :iniciar, :narticulos';
$sentencia_articulos = $pdo->prepare($sql_articulos);
$sentencia_articulos->bindValue(':iniciar', $iniciar, PDO::PARAM_INT);
$sentencia_articulos->bindValue(':narticulos', $art_x_pag, PDO::PARAM_INT);
$sentencia_articulos->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
$sentencia_articulos->execute();

$resultado_articulos = $sentencia_articulos->fetchAll();

foreach ($resultado_articulos as $dato) {
    // Renderiza las filas de la tabla
    echo '<tr>';
    echo '<td>' . $dato['Materia'] . '</td>';
    echo '<td>' . $dato['Libro'] . '</td>';
    echo '<td>' . '<iframe src="' . $URL . '/Public/File/Fisico/' . $dato["Portada"] . '" &embedded=true></iframe>' . '</td>';
    // ... otras columnas ...
    echo '<td><a class="EyE" data-bs-toggle="modal" data-bs-target="#Editar' . $dato["Id"] . '"><i class="fas fa-edit"></i></a></td>';
    echo '<td><a class="EyE" href="' . $URL . '/App/Php/eliminar.php?Id=' . $dato['Id'] . '"><i class="fas fa-trash"></i></a></td>';
    echo '</tr>';
}
?>