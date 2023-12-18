<?php
include ('../../Config/config.php');

session_start();

$usuario_user = $_POST['usuario'];
$password_user = $_POST['password_user'];

// echo $user. " - ". $password_user;
$user_bd=' ';$password_bd=' ';


$query_login = $pdo->prepare("SELECT * FROM user WHERE Username = '$usuario_user' And Password = '$password_user' AND Estado = 1");
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
    $user_bd = $usuario['Username'];
    $password_bd = $usuario['Password'];
}

if (($usuario_user==$user_bd)&&( $password_user== $password_bd)) {
    ?>
    <div class="alert alert-success">Usuario correcto</div>
    <script>location.href="<?php echo $URL;?>Layout/Admin/Index.php"</script>
<?php
$_SESSION['usuario_sesion'] = $user_bd;
}else {
    ?>
    <div class="alert alert-danger">Usuario incorrecto</div>
<?php
}


?>