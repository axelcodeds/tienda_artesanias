<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ARTESANIAS CHILAPA | Tienda Online</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/estilos.css">
    <style>
        /* Paleta de colores verde estilo moderno */
        :root {
            --verde-principal: #00a884;
            /* Verde WhatsApp */
            --verde-oscuro: #008069;
            --verde-claro: #e8f5e9;
            --verde-hover: #00c298;
            --negro: #222222;
            --gris-oscuro: #444444;
            --gris: #666666;
            --gris-claro: #888888;
            --bg-claro: #f8f9fa;
            --blanco: #ffffff;
            --borde: #e0e0e0;
            --sombra: rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-claro);
            color: var(--negro);
            font-family: 'Segoe UI', 'PingFang SC', 'Microsoft YaHei', sans-serif;
            padding-top: 70px;
            line-height: 1.5;
        }

        /* NAVBAR MEJORADA */
        .navbar-default {
            background-color: var(--blanco);
            border: none;
            box-shadow: 0 2px 12px var(--sombra);
            height: 70px;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            width: 100%;
        }

        .navbar-header {
            display: flex;
            align-items: center;
            height: 70px;
        }

        .navbar-brand.text-black {
            color: var(--verde-principal) !important;
            font-weight: 700;
            font-size: 24px;
            letter-spacing: -0.3px;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            height: 100%;
        }

        .navbar-brand.text-black i {
            margin-right: 10px;
            font-size: 22px;
            color: var(--verde-principal);
        }

        /* CONTENEDOR DEL CARRITO CENTRADO */
        #navbar {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            height: 30px;
            margin-top: 10px;
        }

        .nav.navbar-nav.pull-right {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 1000%;
        }

        .nav.navbar-nav.pull-right li {
            display: flex;
            align-items: center;
            height: 100%;
        }

        /* BOTÓN CARRITO CENTRADO Y MEJORADO */
        .btn {
            background-color: var(--verde-principal);
            color: var(--blanco);
            border: none;
            border-radius: 7px;
            padding: 10px 24px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(3, 168, 132, 0.25);
            height: 45px;
            margin: 0;
            text-decoration: none;
        }

        .btn:hover {
            background-color: var(--verde-hover);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 168, 132, 0.35);
            color: var(--blanco);
            text-decoration: none;
        }

        .btn i {
            margin-right: 8px;
            font-size: 16px;
        }

        .badge {
            background-color: var(--blanco);
            color: var(--verde-principal);
            font-weight: 700;
            font-size: 12px;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-left: 8px;
            border: 2px solid var(--verde-principal);
        }

        /* Header promocional */
        .header-promo {
            background: linear-gradient(90deg, var(--verde-principal), var(--verde-oscuro));
            color: white;
            text-align: center;
            padding: 12px 0;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 25px;
            width: 100%;
        }

        .header-promo i {
            margin-right: 8px;
        }

        /* CONTENEDOR PRINCIPAL - PRODUCTOS MÁS ARRIBA */
        #main {
            padding: 0;
            margin-top: 0;
            min-height: calc(100vh - 250px);
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px;
            padding-top: 10px;
        }

        /* PRODUCTOS MÁS ARRIBA Y COMPACTOS */
        .col-md-3 {
            padding: 0 8px;
            margin-bottom: 20px;
        }

        /* TARJETAS DE PRODUCTO MÁS COMPACTAS */
        .panel-default {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background-color: var(--blanco);
            box-shadow: 0 4px 12px var(--sombra);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            margin-bottom: 0;
        }

        .panel-default:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            transform: translateY(-4px);
        }

        /* CABECERA DEL PRODUCTO MÁS PEQUEÑA */
        .panel-heading {
            background-color: var(--blanco);
            border-bottom: 1px solid var(--borde);
            padding: 12px 15px;
            text-align: center;
            flex-shrink: 0;
        }

        .nombreArtesania {
            color: var(--negro);
            font-size: 15px;
            font-weight: 600;
            margin: 0;
            line-height: 1.4;
            height: 42px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        /* CUERPO DE LA TARJETA */
        .panel-body {
            padding: 0;
            flex-grow: 1;
            position: relative;
            background-color: #fafafa;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 220px;
        }

        .img-responsive {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .panel-default:hover .img-responsive {
            transform: scale(1.05);
        }

        /* ETIQUETA "NUEVO" VERDE */
        .new-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: var(--verde-principal);
            color: white;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 4px;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* PIE DE TARJETA MÁS COMPACTO */
        .panel-footer {
            background-color: var(--blanco);
            border-top: 1px solid var(--borde);
            padding: 15px;
            text-align: center;
            flex-shrink: 0;
        }

        /* PRECIO */
        .product-price {
            color: var(--verde-principal);
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .product-price span {
            color: var(--gris-claro);
            font-size: 14px;
            font-weight: 400;
            text-decoration: line-through;
        }

        /* BOTÓN DE COMPRA VERDE */
        .btn-success {
            background-color: var(--verde-principal);
            color: var(--blanco);
            border: none;
            border-radius: 6px;
            padding: 10px 15px;
            font-weight: 600;
            font-size: 14px;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-success:hover {
            background-color: var(--verde-hover);
            transform: translateY(-1px);
        }

        .btn-success i {
            margin-right: 8px;
            font-size: 14px;
        }

        /* MENSAJE SIN PRODUCTOS */
        h4 {
            color: var(--gris-oscuro);
            text-align: center;
            padding: 50px 20px;
            font-weight: 400;
            font-size: 16px;
            background-color: var(--blanco);
            border-radius: 10px;
            margin: 20px auto;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 12px var(--sombra);
        }

        h4 i {
            font-size: 32px;
            margin-bottom: 15px;
            display: block;
            color: var(--verde-principal);
        }

        /* FOOTER VERDE */
        .site-footer {
            background-color: #1a1a1a;
            color: var(--gris-claro);
            padding: 50px 0 20px;
            margin-top: 60px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-section h5 {
            color: var(--blanco);
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--verde-principal);
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-links a {
            color: var(--gris-claro);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--verde-principal);
            padding-left: 5px;
        }

        .footer-links a i {
            margin-right: 8px;
            width: 20px;
            text-align: center;
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #333;
            font-size: 13px;
            color: #999;
        }

        .copyright a {
            color: var(--verde-principal);
            text-decoration: none;
        }

        /* RESPONSIVE */
        @media (max-width: 1199px) {
            .container {
                padding: 0 15px;
            }
        }

        @media (max-width: 992px) {
            .col-md-3 {
                width: 50%;
            }

            .navbar-brand.text-black {
                font-size: 22px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }

            .navbar-default {
                height: 60px;
            }

            .navbar-header,
            #navbar {
                height: 60px;
            }

            .navbar-brand.text-black {
                font-size: 20px;
            }

            .btn {
                padding: 8px 16px;
                font-size: 14px;
                height: 38px;
            }

            .col-md-3 {
                width: 50%;
            }

            .img-responsive {
                height: 200px;
            }

            .header-promo {
                font-size: 12px;
                padding: 10px 15px;
            }
        }

        @media (max-width: 576px) {
            .col-md-3 {
                width: 100%;
                padding: 0 10px;
            }

            .navbar-brand.text-black {
                font-size: 18px;
            }

            .btn {
                padding: 7px 14px;
                font-size: 13px;
            }

            .img-responsive {
                height: 240px;
            }

            .row {
                margin: 0 -5px;
            }
        }

        /* EFECTO DE CARGA DE IMÁGENES */
        .img-loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e8e8e8 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-black" href="index.php">
                    <i class="fas fa-leaf"></i> ARTESANIAS CHILAPA
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="carrito.php" class="btn">
                            <i class="fas fa-shopping-cart"></i> CARRITO
                            <span class="badge"><?php print cantidadartesanias(); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header promocional -->
    <div class="header-promo">
        <i class="fas fa-shipping-fast"></i> ENVÍO GRATIS en pedidos +$300 |
        <i class="fas fa-gift"></i> 100% Artesanías Originales |
        <i class="fas fa-heart"></i> Hecho a Mano
    </div>

    <div class="container" id="main">
        <div class="row">
            <?php
            require 'vendor/autoload.php';
            $artesania = new deadpool\artesania;
            $info_artesanias = $artesania->mostrar();
            $cantidad = count($info_artesanias);
            if ($cantidad > 0) {
                for ($x = 0; $x < $cantidad; $x++) {
                    $item = $info_artesanias[$x];
                    $precio_original = rand(200, 600);
                    $precio_descuento = $precio_original - rand(30, 150);
            ?>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 class="text-center nombreArtesania"><?php print $item['nombre_artesania'] ?></h1>
                            </div>
                            <div class="panel-body">
                                <?php if (rand(0, 2) == 1): ?>
                                    <div class="new-badge">Nuevo</div>
                                <?php endif; ?>

                                <?php
                                $foto = 'upload/' . $item['foto'];
                                if (file_exists($foto)) {
                                ?>
                                    <img src="<?php print $foto; ?>" class="img-responsive" alt="<?php print $item['nombre_artesania'] ?>">
                                <?php } else { ?>
                                    <img src="assets/imagenes/not-found.jpg" class="img-responsive img-loading" alt="Imagen no disponible">
                                <?php } ?>
                            </div>
                            <div class="panel-footer">
                                <div class="product-price">
                                    $<?php echo number_format($precio_descuento, 2); ?>
                                    <span>$<?php echo number_format($precio_original, 2); ?></span>
                                </div>

                                <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                                    <i class="fas fa-cart-plus"></i> Agregar al Carrito
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else { ?>
                <div class="col-md-12">
                    <h4>
                        <i class="fas fa-seedling"></i>
                        NO HAY ARTESANÍAS DISPONIBLES<br>
                        <small style="font-weight: 300; font-size: 14px; margin-top: 10px; display: block;">
                            Estamos preparando nuevas artesanías artesanales
                        </small>
                    </h4>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="site-footer">
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-section">
                    <h5>ARTESANÍAS CHILAPA</h5>
                    <div class="footer-links">
                        <a href="#"><i class="fas fa-history"></i> Nuestra Historia</a>
                        <a href="#"><i class="fas fa-hands-helping"></i> Artesanos</a>
                        <a href="#"><i class="fas fa-leaf"></i> Sostenibilidad</a>
                        <a href="#"><i class="fas fa-briefcase"></i> Trabaja con Nosotros</a>
                    </div>
                </div>
                <div class="footer-section">
                    <h5>AYUDA</h5>
                    <div class="footer-links">
                        <a href="#"><i class="fas fa-question-circle"></i> Centro de Ayuda</a>
                        <a href="#"><i class="fas fa-shipping-fast"></i> Envíos y Entregas</a>
                        <a href="#"><i class="fas fa-exchange-alt"></i> Devoluciones</a>
                        <a href="#"><i class="fas fa-phone-alt"></i> Contacto</a>
                    </div>
                </div>
                <div class="footer-section">
                    <h5>LEGAL</h5>
                    <div class="footer-links">
                        <a href="#"><i class="fas fa-file-contract"></i> Términos y Condiciones</a>
                        <a href="#"><i class="fas fa-shield-alt"></i> Política de Privacidad</a>
                        <a href="#"><i class="fas fa-cookie-bite"></i> Política de Cookies</a>
                    </div>
                </div>
                <div class="footer-section">
                    <h5>SÍGUENOS</h5>
                    <div class="footer-links">
                        <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
                        <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                        <a href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                        <a href="#"><i class="fab fa-pinterest"></i> Pinterest</a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> Artesanías Chilapa. Todos los derechos reservados. |
                <a href="#">Hecho a Mano con ❤️ </a>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Remover clase de carga cuando la imagen se cargue
            $('img.img-responsive').on('load', function() {
                $(this).removeClass('img-loading');
            }).each(function() {
                if (this.complete) $(this).trigger('load');
            });

            // Contador de visitas simulado
            $('.panel-default').each(function() {
                var visits = Math.floor(Math.random() * 45) + 15;
                $(this).find('.panel-body').append(
                    '<div style="position:absolute; bottom:10px; right:10px; background:rgba(0,168,132,0.9); color:white; font-size:10px; padding:3px 8px; border-radius:4px; z-index:2;">' +
                    '<i class="fas fa-eye" style="margin-right:4px;"></i>' + visits +
                    '</div>'
                );
            });
        });
    </script>

</body>

</html>
