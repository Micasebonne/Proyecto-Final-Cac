<?php
//$idpedido = $_POST['idpedido'];
$idpedido = 
require_once("../dao/PedidoDAOEC.php");

$pedidoDAO = new pedidoDAOEC();
$eliminarOk = $pedidoDAO->eliminarPedido($idpedido);

if ($eliminarOk) {
    echo "<p>Redireccionando...</p>";
    //header("Location: ../view/ListapedidosEC3.php");
    //exit;
    
}else {
    echo "No se pudo eliminar el registro";
}

?>