<?php 
class ProvinciaDAOEC {

    public function listarProvincias() {
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();
        $result = $conexionDB->ejecutar("SELECT * FROM provincias ORDER BY nombre");

        while ($provincia = $result->fetch_assoc()) {
            $listaProvincias[] = $provincia; 
        }
        
        return $listaProvincias;
    } 

    public function buscarNombrePorID($idProvincia){
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();
        $result = $conexionDB->ejecutar("SELECT * FROM provincias WHERE idprovincia =".$idProvincia);

        $provincia = $result->fetch_assoc();

        return $provincia["nombre"];
    }

}

?>