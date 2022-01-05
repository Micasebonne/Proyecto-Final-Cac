<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body class="bg-light text-center">
    <div class="container">
        <div class="py-4">
            <img src="../images/logo.jpg" alt="Logo Codo a Codo" width="72" height="72" class="mb-4 mx-auto">
            <h3>Pedidos</h3>
            <p class="lead">Listado de pedidos pendientes</p>
        </div>

    <table class="table table-striped table-bordered table-hover table-sm">
        <thead class="thead-dark table-dark">
            <tr>
                <th>#ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Mail</th>
                <th>Dirección</th>
                <th>Localidad</th>
                <th>Provincia</th>
                <th>Código Postal</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("../dao/PedidoDAOEC.php");
            require_once("../dao/LocalidadDAOEC.php");
            require_once("../dao/ProvinciaDAOEC.php");
            $PedidoDAO = new PedidoDAOEC();
            $listadoPedidos = $PedidoDAO->listarPedidos();
            
            $localidadDAO = new LocalidadDAOEC(); 
            $provinciaDAO = new ProvinciaDAOEC();
            for ($i=0; $i < count($listadoPedidos) ; $i++) { 
                $idPedido = $listadoPedidos[$i]["idpedido"];
                $phpEliminar = "../controller/checkElimPedido.php"; //?idPedido=".$idPedido.""; //"javascript:eliminarPedido(".$idPedido.");";
                
                $idLocalidad = $listadoPedidos[$i]["localidad"]; 
                $nombreLoc = $localidadDAO->buscarNombrePorID($idLocalidad);
                
                $idProvincia = $listadoPedidos[$i]["provincia"];
                $nombreProv = $provinciaDAO->buscarNombrePorID($idProvincia);
                
                echo "<tr>";
                echo "<td>".$listadoPedidos[$i]["idpedido"]."</td>";
                echo "<td>".$listadoPedidos[$i]["nombre"]."</td>";
                echo "<td>".$listadoPedidos[$i]["apellido"]."</td>";
                echo "<td>".$listadoPedidos[$i]["usuario"]."</td>";
                echo "<td>".$listadoPedidos[$i]["mail"]."</td>";
                echo "<td>".$listadoPedidos[$i]["lugarentrega"]."</td>";
                echo "<td>".$nombreLoc."</td>";
                echo "<td>".$nombreProv."</td>"; 
                echo "<td>".$listadoPedidos[$i]["codpostal"]."</td>";
                echo "<td><a href='".$phpEliminar."'>Eliminar</a></td>"; 
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
        </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="../js/pedidos.js"></script>

</body>
</html>