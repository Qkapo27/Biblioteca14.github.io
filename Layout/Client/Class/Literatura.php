<?php 
    include('../../../App/Config/config.php');
    include('../../../App/Php/controlador.php');


    $sql_total_libros = 'SELECT COUNT(*) as total FROM Inventario WHERE Materia = "Literatura"';
    $stmt_total_libros = $pdo->prepare($sql_total_libros);
    $stmt_total_libros->execute();
    $total_libros_db = $stmt_total_libros->fetchColumn();

    $art_x_pag = 20; // Número de artículos por página
    $paginas = ceil($total_libros_db / $art_x_pag); // Calcular el número de páginas

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Colegio 14</title>
        <!-- Css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Public/Css/Style.css">
        

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        
    
    </head>
    <body>
        <?php
            if (!$_GET) {
                header('Location:Literatura.php?pagina=1');
            }
            if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                header('Location:Literatura.php?pagina=1');
            }
            
            $iniciar = ($_GET['pagina'] - 1) * $art_x_pag;
            
            
            $sql_articulos = 'SELECT * FROM Inventario WHERE Materia = "Literatura" LIMIT :iniciar, :narticulos';
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
                <img src="../../../Public/Img/assets/logo.jpg" alt="" style="width: 60px;height: 60px;">
            </a>
            <a class="navbar-brand" href="#">Biblioteca Colegio 14</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto p-2">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $URL;?>/Layout/Client/Index.php">
                            <i class="fas fa-home mr-2 lead fa-fw me-3"></i>Inicio
                        </a>
                    </li>       
                    <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $URL;?>/Layout/Client/Inventario.php">
                                <i class="fas fa-atlas mr-2 lead fa-fw me-3"></i>Inventario
                            </a>
                        </li>             
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page"   href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-book mr-2 lead fa-fw me-3"></i> Categoria
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="dropdown-item" href="Literatura.php">                            
                                    <img src="../../../Public/Img/Icons/Literatura.png" alt="" class="mr-2 lead fa-fw me-3">Literatura
                                </a>
                                <a class="dropdown-item" href="Matematica.php">                            
                                    <img src="../../../Public/Img/Icons/Math.png" alt="" class="mr-2 lead fa-fw me-3">Matematica
                                </a>
                                <a class="dropdown-item" href="Sociales.php">                            
                                    <img src="../../../Public/Img/Icons/Social.png" alt="" class="mr-2 lead fa-fw me-3">Ciencias Sociales
                                </a>
                                <a class="dropdown-item" href="Naturales.php">                            
                                    <img src="../../../Public/Img/Icons/Nat.png" alt="" class="mr-2 lead fa-fw me-3">Ciencias Naturales
                                </a>
                                <a class="dropdown-item" href="Fisica.php">                            
                                    <img src="../../../Public/Img/Icons/Fisica.png" alt="" class="mr-2 lead fa-fw me-3">Fisica
                                </a>
                                <a class="dropdown-item" href="Ingles.php">                            
                                    <img src="../../../Public/Img/Icons/Ingles.png" alt="" class="mr-2 lead fa-fw me-3">Ingles
                                </a>
                                <a class="dropdown-item" href="F.Etica.php">                            
                                    <img src="../../../Public/Img/Icons/F.Etica.png" alt="" class="mr-2 lead fa-fw me-3">Formacion Etica
                                </a>
                                <a class="dropdown-item" href="Historia.php">                            
                                    <img src="../../../Public/Img/Icons/Historia.png" alt="" class="mr-2 lead fa-fw me-3">Historia
                                </a>
                                <a class="dropdown-item" href="Biologia.php">                            
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
                                            <?php include('../../../App/Php/ModalLogin.php');?>
                                        </div>                    
                                    </div>
                                </div>
                            </div>
                    </div>
                <!-- Fin Login -->
            </div>
        </div>
    </nav>       
            
    <!-- Portadas -->
        <h1 class="text-center">Libros de <img src="../../../Public/Img/Icons/Literatura.png" alt="" class="mr-2 fa-fw me-3"><strong>Literatura</strong></h1>
        <hr>
            <div class="container pt-md-5 ">
                <div class="row gy-md-3">
                    <h2 class="text-center"><img src="../../../Public/Img/Icons/Fisico.png" alt="" class="mr-2 fa-fw me-3"><strong>Fisicos</strong></h2>
                        <!-- Mostar Portadas -->
                            <?php 
                                foreach ($resultado_articulos as $dato):                           
                                    if ($dato['Materia']=='Literatura') {
                                        include ("../../../App/Php/Parts/Fisico.php");
                                };
                                endforeach
                            ?>
                        
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : ' ' ?>">
                                <a class="page-link" href="Literatura.php?pagina=<?php echo $_GET['pagina']-1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <?php for ($i=0; $i < $paginas ; $i++): ?>
                                
                            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : ' ' ?>" >
                                <a class="page-link" href="Literatura.php?pagina=<?php echo $i+1?>">
                                    <?php echo $i+1?>
                                </a>
                            </li>

                            <?php endfor ?>
                            
                            <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled' : ' ' ?>">
                                <a class="page-link" href="Literatura.php?pagina=<?php echo $_GET['pagina']+1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

                
                    
                </div>        
            </div>

        <!-- Js -->
        <?php
            include ("../../../App/Php/Parts/Footer.php");
        ?> 
            <!-- Bootstrap 5.3 -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
            <!-- Jquery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <!-- Login -->
            <script>
                $('#btnIngresar').click(function(){
                    var usuario=$('#User').val();
                    var password_user=$('#Password').val();
                                        
                    var url = '../../../App/Php/User/LoginClass.php';
                    $.post(url , {usuario:usuario , password_user:password_user}, function(datos){
                        $('#respuesta').html(datos);
                    })
                });                
            </script>
    </body>
</html>