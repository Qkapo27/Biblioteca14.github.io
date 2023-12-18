<?php 
    include('../../App/Config/config.php');
    include('../../App/Php/controlador.php');

    
    // Modifica la consulta para contar solo los libros de literatura
    $sql_total_libros = 'SELECT COUNT(*) as total FROM Inventario';
    $stmt_total_libros = $pdo->prepare($sql_total_libros);
    $stmt_total_libros->execute();
    $total_libros_db = $stmt_total_libros->fetchColumn();

    $art_x_pag = 20; // Número de artículos por página
    $paginas = ceil($total_libros_db / $art_x_pag); // Calcular el número de páginas
    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Colegio 14</title>
        <!-- Css -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <link rel="stylesheet" href="../../Public/Css/Style.css">
            <!-- DataTable -->
            <link href="//cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">
        <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        

    </head>
    <body>
    <?php
            if (!$_GET) {
                header('Location:Inventario.php?pagina=1');
            }
            if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                header('Location:Inventario.php?pagina=1');
            }
            
            $iniciar = ($_GET['pagina'] - 1) * $art_x_pag;
            
            // Modifica la consulta para obtener solo los libros de literatura paginados
            $sql_articulos = 'SELECT * FROM Inventario LIMIT :iniciar, :narticulos';
            $sentencia_articulos = $pdo->prepare($sql_articulos);
            $sentencia_articulos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT); 
            $sentencia_articulos->bindParam(':narticulos', $art_x_pag, PDO::PARAM_INT); 
            $sentencia_articulos->execute();
            
            $resultado_articulos = $sentencia_articulos->fetchAll();

        ?>
    <!-- Barra de navegacion -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a href="#" class="">
                    <img src="../../Public/Img/assets/logo.jpg" alt="" style="width: 60px;height: 60px;">
                </a>
                <a class="navbar-brand" href="#">Biblioteca Colegio 14</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto p-2">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"  href="<?php echo $URL;?>/Layout/Client/Index.php">
                                <i class="fas fa-home mr-2 lead fa-fw me-3"></i>Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $URL;?>/Layout/Client/Inventario.php">
                                <i class="fas fa-atlas mr-2 lead fa-fw me-3"></i>Inventario
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-book mr-2 lead fa-fw me-3"></i> Categoria
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="Class/Literatura.php">                            
                                    <img src="../../../Public/Img/Icons/Literatura.png" alt="" class="mr-2 lead fa-fw me-3">Literatura
                                    </a>
                                    <a class="dropdown-item" href="Class/Matematica.php">                            
                                    <img src="../../../Public/Img/Icons/Math.png" alt="" class="mr-2 lead fa-fw me-3">Matematica
                                    </a>
                                    <a class="dropdown-item" href="Class/Sociales.php">                            
                                    <img src="../../../Public/Img/Icons/Social.png" alt="" class="mr-2 lead fa-fw me-3">Ciencias Sociales
                                    </a>
                                    <a class="dropdown-item" href="Class/Naturales.php">                            
                                    <img src="../../../Public/Img/Icons/Nat.png" alt="" class="mr-2 lead fa-fw me-3">Ciencias Naturales
                                    </a>
                                    <a class="dropdown-item" href="Class/Fisica.php">                            
                                    <img src="../../../Public/Img/Icons/Fisica.png" alt="" class="mr-2 lead fa-fw me-3">Fisica
                                    </a>
                                    <a class="dropdown-item" href="Class/Ingles.php">                            
                                    <img src="../../../Public/Img/Icons/Ingles.png" alt="" class="mr-2 lead fa-fw me-3">Ingles
                                    </a>
                                    <a class="dropdown-item" href="Class/F.Etica.php">                            
                                    <img src="../../../Public/Img/Icons/F.Etica.png" alt="" class="mr-2 lead fa-fw me-3">Formacion Etica
                                    </a>
                                    <a class="dropdown-item" href="Class/Historia.php">                            
                                    <img src="../../../Public/Img/Icons/Historia.png" alt="" class="mr-2 lead fa-fw me-3">Historia
                                    </a>
                                    <a class="dropdown-item" href="Class/Biologia.php">                            
                                    <img src="../../../Public/Img/Icons/Biologia.png" alt="" class="mr-2 lead fa-fw me-3">Biologia
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                    <!-- Login -->
                <div class="nav-link dropdown">
                        <a class="d-flex align-items-center text-success text-decoration-none dropdown-toggle" data-bs-toggle="modal" data-bs-target="#Login" href="#">
                            <h3>
                                <strong><i class="fas fa-user"></i></i>Ingresar</strong>
                            </h3>
                        </a>
                        <!-- Registro -->
                            <!-- Modal Login  -->
                            <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="ModalLogin" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="agregar">Ingresar</h1>
                                        </div>
                                        <div class="modal-body">
                                            <?php include('../../App/Php/ModalLogin.php');?>
                                        </div>                    
                                    </div>
                                </div>
                            </div>
                    </div>
                <!-- Fin Login -->
                </div>
                </div>
            </div>
        </nav> 

        <div class="container-fluid overflow-hidden">
            <div class="row overflow-hidden">        
                <section class="col d-flex flex-column"> 
                    <main class="row overflow-hidden overflow-x-auto overflow-y-scroll ">
                        <div class="col">
                            <!-- Altas -->
                            <h1 class="display-3 text-center"> Atlas </h1>
                                <!--  -->
                                <table class="table table-striped table-hover">
                                    <input type="text" id="searchInput" placeholder="Buscar..." class="col-12 mt-2 mb-2">
                                    <thead class="thead-dark">
                                        <tr class="table-dark">
                                            <th class="col">Materia</th>
                                            <th class="col">Libro</th>
                                            <th class="col">Portada</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTableBody">
                                        <?php 
                                            foreach ($resultado_articulos as $dato): ?>                        
                                                <tr>
                                                    <td><?php echo $dato['Materia']; ?></td>
                                                    <td><?php echo $dato['Libro']; ?></td>
                                                    <td><?php echo '<iframe src="' . $URL . '/Public/File/Fisico/' . $dato["Portada"] . '" &embedded=true></iframe>'; ?></td>
                                                </tr>
                                            <?php 
                                            endforeach
                                        ?>
                                    </tbody>
                                    <!-- Agrega la fila para el paginado -->
                                    <tfoot>
                                    <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-center">
                                                <?php
                                                $numPaginasMostradas = 10; // Cambia esto al número de páginas que deseas mostrar.
                                                $mitadPaginas = floor($numPaginasMostradas / 2);

                                                // Calcular los límites para mostrar solo un número específico de páginas.
                                                $inicio = max(1, $paginaActual - $mitadPaginas);
                                                $fin = min($paginas, $paginaActual + $mitadPaginas);

                                                // Mostrar la página anterior si no es la primera página.
                                                if ($paginaActual > 1) {
                                                    ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="?pagina=<?php echo ($paginaActual - 1); ?>" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }

                                                for ($i = $inicio; $i <= $fin; $i++) {
                                                    ?>
                                                    <li class="page-item <?php echo ($i == $paginaActual) ? 'active' : ''; ?>">
                                                        <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                    </li>
                                                <?php
                                                }

                                                // Mostrar la página siguiente si no es la última página.
                                                if ($paginaActual < $paginas) {
                                                    ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="?pagina=<?php echo ($paginaActual + 1); ?>" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </nav>
                                    </tfoot>
                                </table>
                            </section>       
                        <!-- </div> -->
                    </main>
                    <br>
                </div>
            </div>
        </div>
    </div>
            <?php
                include ("../../App/Php/Parts/Footer.php");
            ?>
        
        <!-- Js -->
            
            <!-- Bootstrap 5.3 -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
            <!-- Jquery -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="../../Public/Js/Jquery.js"></script>
                
                <script>
                // Login
                    $('#btnIngresar').click(function(){
                        var usuario=$('#User').val();
                        var password_user=$('#Password').val();
                                            
                        var url = '../../App/Php/User/Login.php';
                        $.post(url , {usuario:usuario , password_user:password_user}, function(datos){
                            $('#respuesta').html(datos);
                        })
                    });
                // Buscador
                    $(document).ready(function() {
                        $("#searchInput").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            var paginaActual = <?php echo $paginaActual; ?>;

                            // Realiza una solicitud AJAX para obtener los resultados filtrados
                            $.ajax({
                                url: '../../App/Php/filtro_busqueda.php', // Cambia a la URL de tu script de filtrado en el servidor
                                type: 'POST',
                                data: { 
                                    search: value,
                                    pagina: paginaActual
                                },
                                success: function(response) {
                                    $("#myTableBody").html(response);
                                }
                            });
                        });
                    });
            </script>

    </body>
</html>