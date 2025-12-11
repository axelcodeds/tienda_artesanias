<?php
session_start();
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ARTESANIAS CHILAPA</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Menú</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="index.php">Artesanías Chilapa</a>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="panel panel-default">
                    <div class="panel-body">

                        <h2 class="text-center text-primary">
                            <strong>¡Gracias por tu compra!</strong>
                        </h2>

                        <p class="text-center lead">
                            Para procesar tu pedido, realiza el pago siguiendo las instrucciones.
                        </p>

                        <hr>

                        <!-- Sección: Instrucciones -->
                        <h3 class="text-primary"><strong>📝 Instrucciones para completar tu pago</strong></h3>

                        <div class="alert alert-info">
                            <strong>1. Realiza una transferencia o depósito</strong><br>
                            Usa los datos bancarios mostrados abajo.
                        </div>

                        <div class="alert alert-info">
                            <strong>2. Guarda el comprobante</strong><br>
                            Puede ser captura de pantalla o PDF.
                        </div>

                        <div class="alert alert-info">
                            <strong>3. Envíalo por WhatsApp</strong><br>
                            Así confirmamos tu pedido y procedemos al envío.
                        </div>

                        <br>

                        <!-- Datos bancarios -->
                        <div class="panel panel-info">
                            <div class="panel-heading text-center">
                                <strong>💳 Datos Bancarios</strong>
                            </div>
                            <div class="panel-body">
                                <p><strong>Banco:</strong> BBVA</p>
                                <p><strong>Cuenta:</strong> 1534859019</p>
                                <p><strong>CLABE:</strong> 012180015348590191</p>
                                <p><strong>Titular:</strong> Artesanías Chilapa</p>
                            </div>
                        </div>

                        <br>

                        <!-- Teléfono -->
                        <p class="text-center">
                            Una vez realizado el pago, envía tu comprobante al siguiente número:
                        </p>

                	   <h3 class="text-center text-success">
 					   <img src="https://img.icons8.com/?size=100&id=uZWiLUyryScN&format=png&color=000000" 
   					      alt="WhatsApp" width="24px" style="vertical-align: middle; margin-right: 6px;">
					    <strong>554-535-4031</strong>
						</h3>

                        <br>

                        <!-- Advertencias -->
                        <div class="alert alert-warning">
                            <strong>⚠ Importante:</strong>
                            <ul class="list-unstyled" style="margin-top: 10px;">
                                <li>• Tu pedido se procesará solo después de confirmar el pago.</li>
                                <li>• Asegúrate de que el comprobante sea legible.</li>
                                <li>• Si pagas en OXXO, conserva el ticket completo.</li>
                            </ul>
                        </div>

                        <br>

                        <!-- Botón volver -->
                        <div class="text-center">
                            <a href="index.php" class="btn btn-primary btn-lg">
                                Volver a la tienda
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
