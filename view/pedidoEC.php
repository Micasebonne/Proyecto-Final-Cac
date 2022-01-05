<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="">
</head>

<body class="bg-light text-center">
    <div class="container">
        <div class="py-4">
            <img src="images/logo.jpg" alt="Logo de Codo a Codo" width="72" height="72" class="d-block mx-auto mb-4">
            <h3>Formulario de Pedidos</h3>
            <p class="lead">Ingrese los datos para realizar un pedido</p>

            <div class="col-md-12">
                <form action="../controller/checkPedidoEC.php" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" placeholder="Tu nombre" required
                                class="form-control">
                            </div>

                        <div class="col-md-6 mb-4">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" placeholder="Tu apellido" required
                                class="form-control">
                             </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="usuario">Nombre de usuario</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="usuario" id="usuario" required class="form-control" placeholder="Username"
                                aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="email">Email <span class="text-muted">(opcional)</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su mail">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="direccion">Lugar de entrega</label>
                            <input type="text" name="direccion" id="direccion" required class="form-control" placeholder="Ingrese la dirección de entrega">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="mb-3">
                                <label for="localidad" class="form-label">Localidad</label>
                                <select class="form-select" name="localidad" id="localidad">
                                    <option selected>Seleccione una localidad</option>
                                    <?php
                                     require_once("../dao/LocalidadDAOEC.php");
                                     $localidadDAO = new LocalidadDAOEC();
                                     $listaLocalidades = $localidadDAO->listarLocalidades();

                                     for ($i=0; $i < count($listaLocalidades) ; $i++) {
                                         echo " <option value='".$listaLocalidades[$i]["idlocalidad"] ."'>".
                                         $listaLocalidades[$i]["nombrelocalidad"]."</option>";
                                     }
                                    ?>
                                 </select>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Provincia</label>
                                <select class="form-select" name="provincia" id="provincia">
                                    <option selected>Seleccione una provincia</option>    
                                    <?php 
                                    require_once("../dao/ProvinciaDAOEC.php");
                                    $provinciaDAO = new ProvinciaDAOEC();
                                    $listaProvincias = $provinciaDAO->listarProvincias();
                                    
                                    for ($i=0; $i < count($listaProvincias) ; $i++) { 
                                        echo "<option value='".$listaProvincias[$i]["idprovincia"]."'>
                                        " .$listaProvincias[$i]["nombre"]."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <label for="" class="form-label">Código Postal</label>
                            <input type="text" name="codPostal" id="codPostal" required class="form-control" placeholder="Ingrese el código postal">
                        </div>
                    </div>

                    <hr class="mb-6">
                    <h4 class="mb-4">Forma de Pago</h4>

                    <div class="row">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="formaPago" id="formaPago" value="tarjeta">
                        Tarjeta de Crédito
                        </label>
                        <br>
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="formaPago" id="formaPago" value="mercadoPago">
                        Mercado Pago
                        </label>
                    </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="titular">Nombre del Titular</label>
                            <input type="text" name="titular" id="titular" required class="form-control">
                            <small class="text-muted">Nombre como se muestra en la tarjeta</small>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="nroTarjeta">Número de la Tarjeta</label>
                            <input type="text" name="nroTarjeta" id="nroTarjeta" required class="form-control">
                            <small class="text-muted">Ingrese los 16 dígitos de la Tarjeta</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-4"></div>
                        <div class="col-md-3 mb-4">
                            <label for="fechaVto">Fecha de Vencimiento</label>
                            <input type="text" name="fechaVto" id="fechaVto" required class="form-control">
                            <small class="text-muted">Ingrese los 4 dígitos sin barras ni espacios</small>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label for="codTarjeta">Código</label>
                            <input type="text" name="codTarjeta" id="codTarjeta" required class="form-control">
                            <small class="text-muted">Ingrese el código de seguridad</small>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary">Ingresar pedido</button>
                    </div>

                </form>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

</body>

</html>