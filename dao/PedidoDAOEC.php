<?php 
class PedidoDAOEC {

    public function guardarPedido($pedido){
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();
    
        
        $sql = "INSERT INTO pedidos 
        (`idpedido`, `nombre`, `apellido`, `usuario`, `mail`, `lugarentrega`, `localidad`, `provincia`, `codpostal`, `formadepago`, `tarjtitular`, `tarjnumero`, `tarjvto`, `tarjclave`)
        VALUES (
            {$pedido->getIdPedido()},
           '{$pedido->getNombre()}', 
           '{$pedido->getApellido()}', 
           '{$pedido->getUsuario()}', 
           '{$pedido->getMail()}', 
           '{$pedido->getLugarEntrega()}',
           {$pedido->getLocalidad()},
           {$pedido->getProvincia()},
           '{$pedido->getCodPostal()}', 
           '{$pedido->getFormaDePago()}', 
           '{$pedido->getTarjTitular()}', 
            {$pedido->getTarjNumero()}, 
            '{$pedido->getTarjVto()}', 
            {$pedido->getTarjClave()} 
        )";

        $conexionDB->ejecutar($sql);
    
        $guardOk = $conexionDB->cantFilas() > 0; 
        
        return $guardOk;
    }
    
    public function listarPedidos(){
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();

        $result = $conexionDB->ejecutar("SELECT * FROM pedidos");
        
        while ($pedido = $result->fetch_assoc()) {
            $listadoPedidos[] = $pedido; 
        }

        return $listadoPedidos;
    }

    public function eliminarPedido($idPedido){
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();

        $sql = "DELETE FROM pedidos WHERE idpedido =".$idPedido;
        $conexionDB->ejecutar($sql);
  
        $eliminarPedido = $conexionDB->cantFilas() > 0;

        return $eliminarPedido;
    
        
    }
    
}

?>