function eliminarPedido(idPedido){
    var ok = confirm("Está seguro que desea eliminar el pedido?");

    if (ok) {
        window.location.href="listadoPedidosEC3.php";
    } else {
        alert("No se ha podido eliminar el registro");
    }

}