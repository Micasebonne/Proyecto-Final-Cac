<?php 
class LocalidadDAOEC {

    public function listarLocalidades() {
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();
        $result = $conexionDB->ejecutar("SELECT * FROM localidades ORDER BY nombrelocalidad");

        while ($localidad = $result->fetch_assoc()) {
            $listaLocalidades[] = $localidad; 
        }
        
        return $listaLocalidades;
    } 

    public function buscarNombrePorID($idLocalidad){
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();

        $result = $conexionDB->ejecutar("SELECT * FROM localidades WHERE idlocalidad = ".$idLocalidad);

        $pedidoArray = $result->fetch_assoc();
        
        return $pedidoArray["nombrelocalidad"];
    }

}
?>