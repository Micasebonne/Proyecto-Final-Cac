<?php 
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$usuario=$_POST["usuario"];
$email=$_POST["email"];
$direccion=$_POST["direccion"];
$localidad=$_POST["localidad"];
$provincia=$_POST["provincia"];
$codPostal=$_POST["codPostal"];
$formaPago=$_POST["formaPago"];
$titular=$_POST["titular"];
$nroTarjeta=$_POST["nroTarjeta"];
$fechaVto=$_POST["fechaVto"];
$codTarjeta=$_POST["codTarjeta"];

require_once("../model/Pedido.php");
$pedido = new Pedido($nombre, $apellido, $usuario, $email, $direccion, $localidad, $provincia, $codPostal, $formaPago, $titular, $nroTarjeta, $fechaVto, $codTarjeta);

require_once("../dao/PedidoDAOEC.php");
$pedidoDAO = new PedidoDAOEC();
$guardadOk = $pedidoDAO->guardarPedido($pedido);

if($guardadOk) {
    echo "El pedido se guardó correctamente";
}else {
    echo "Error al guardar el pedido";
}

?>