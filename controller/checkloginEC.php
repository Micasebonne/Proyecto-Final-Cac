<?php
$email = $_POST['email'];
$password = $_POST['password'];

require_once("../dao/UsuarioDAOEC.php");

$usuarioDAO = new UsuarioDAOEC();
$usuarioYPasswordValidos = $usuarioDAO->validarUsuarioYPassword($email, $password);

if ($usuarioYPasswordValidos) {
    header("Location: ../view/pedidoEC.php");
    exit;
}else {
    header("Location: ../view/LoginError.html");
    exit;
}
?>