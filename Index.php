<?php 
    include('App/Config/config.php');
    include('App/Php/controlador.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Colegio 14</title>
    <!-- Css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css
" rel="stylesheet">
        <link rel="stylesheet" href="Public/Css/Style.css">
    <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="#" class="">
                <img src="Public/Img/assets/logo.jpg" alt="" style="width: 60px;height: 60px;">
            </a>
            <a class="navbar-brand" href="#">Biblioteca Colegio 14</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto p-2">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="#">
                            <i class="fas fa-home mr-2 lead fa-fw me-3"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $URL;?>/Layout/Client/Inventario.php">
                            <i class="fas fa-atlas mr-2 lead fa-fw me-3"></i>Inventario
                        </a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-book mr-2 lead fa-fw me-3"></i> Categoria
                        </a>
                        <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="<?php echo $URL;?>Layout/Client/Class/Literatura.php">                            
                                    <img src="Public/Img/Icons/Literatura.png" alt="" class="mr-2 lead fa-fw me-3">Literatura
                                    </a>
                                    <a class="dropdown-item" href="<?php echo $URL;?>Layout/Client/Class/Matematica.php">                            
                                    <img src="Public/Img/Icons/Math.png" alt="" class="mr-2 lead fa-fw me-3">Matematica
                                    </a>
                                    <a class="dropdown-item" href="<?php echo $URL;?>Layout/Client/Class/Sociales.php">                            
                                    <img src="Public/Img/Icons/Social.png" alt="" class="mr-2 lead fa-fw me-3">Ciencias Sociales
                                    </a>
                                    <a class="dropdown-item" href="<?php echo $URL;?>Layout/Client/Class/Naturales.php">                            
                                    <img src="Public/Img/Icons/Nat.png" alt="" class="mr-2 lead fa-fw me-3">Ciencias Naturales
                                    </a>
                                    <a class="dropdown-item" href="<?php echo $URL;?>Layout/Client/Class/Fisica.php">                            
                                    <img src="Public/Img/Icons/Fisica.png" alt="" class="mr-2 lead fa-fw me-3">Fisica
                                    </a>
                                    <a class="dropdown-item" href="<?php echo $URL;?>Layout/Client/Class/Ingles.php">                            
                                    <img src="Public/Img/Icons/Ingles.png" alt="" class="mr-2 lead fa-fw me-3">Ingles
                                    </a>
                                    <a class="dropdown-item" href="<?php echo $URL;?>Layout/Client/Class/F.Etica.php">                            
                                    <img src="Public/Img/Icons/F.Etica.png" alt="" class="mr-2 lead fa-fw me-3">Formacion Etica
                                    </a>
                                    <a class="dropdown-item" href="<?php echo $URL;?>Layout/Client/Class/Historia.php">                            
                                    <img src="Public/Img/Icons/Historia.png" alt="" class="mr-2 lead fa-fw me-3">Historia
                                    </a>
                                    <a class="dropdown-item" href="<?php echo $URL;?>Layout/Client/Class/Biologia.php">                            
                                    <img src="Public/Img/Icons/Biologia.png" alt="" class="mr-2 lead fa-fw me-3">Biologia
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
                                            <?php include('App/Php/ModalLogin.php');?>
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

    <div class="container">
        <h2 class="text-center" id="st">Sitio web creado por</h2>
        <h1 class="text-center" id="p23"><strong>Promo 23</strong></h1>
        <img src="Public/Img/23/1.jpg" class="d-block w-100" alt="...">
    </div>



    <?php
        include ("App/Php/Parts/Footer.php");
    ?>
            
    <!-- Bootstrap 5.3 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="Public/Js/Jquery.js"></script>
            
    <!-- Login -->
        <script>
            $('#btnIngresar').click(function(){
                var usuario=$('#User').val();
                var password_user=$('#Password').val();
                var url = 'App/Php/User/Login.php';
                $.post(url , {usuario:usuario , password_user:password_user}, function(datos){
                    $('#respuesta').html(datos);
                })
            });
        </script>
</body>
</html>