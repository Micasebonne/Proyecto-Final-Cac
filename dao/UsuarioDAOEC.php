<?php 
class UsuarioDAOEC {

    public function validarUsuarioYPassword($email, $password) {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new conexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();

        $sql = "SELECT * FROM usuarios WHERE usuario='$email' and clave='$password'";
        $conexionDB->ejecutar($sql);

        $usuarioYPasswordValidos = $conexionDB->cantFilas() > 0;

        $conexionDB->cerrar();
        return $usuarioYPasswordValidos;
    }
}
?>