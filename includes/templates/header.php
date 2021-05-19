
<?php
    // Definir un nombre para cachear
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    // Definir archivo para cachear (puede ser .php también)
    $archivoCache = 'cache/'.$pagina.'.html';
    // Cuanto tiempo deberá estar este archivo almacenado
    $tiempo = 36000;
    // Checar que el archivo exista, el tiempo sea el adecuado y muestralo
    if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
        include($archivoCache);
        exit;
    }
    // Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
    ob_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Buenos Aires WebCamp</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link rel="manifest" href="site.webmanifest" />
    <link rel="apple-touch-icon" href="icon.png" />
    <!-- Place favicon.ico in the root directory -->
    <script src="https://kit.fontawesome.com/70815a93a7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet" />
    
    <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if ($pagina == 'invitados' || $pagina == 'index') {
        echo '<link rel="stylesheet" href="css/colorbox.css" />';
    } elseif ($pagina == 'conferencia') {
        echo '<link rel="stylesheet" href="css/lightbox.css" />';
    }
    ?>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/main.css" />

    <meta name="theme-color" content="#fafafa" />
</head>

<body class="<?php echo $pagina; ?>">
    <!--[if IE]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
                <!--Redes sociales-->
                <div class="informacion-evento">
                    <p class="fecha"><i class="fas fa-calendar-alt"></i> 10-20-Dic</p>
                    <p class="ciudad">
                        <i class="fas fa-map-marker-alt"></i> Buenos Aires, AR
                    </p>
                </div>
                <!--informacion evento-->
                <div class="titulo-evento">
                    <h1 class="nombre-sitio">BsAsWebCamp</h1>
                    <p class="slogan">
                        La mejor conferencia de <span>diseño web</span>
                    </p>
                </div>
            </div>
            <!--Hero-->
        </div>
    </header>

    <div class="barra">
        <div class="menu-navegacion contenedor">
            <div class="logo">
                <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
            </div>
            <div class="menu-movil">
                <span> </span>
                <span> </span>
                <span> </span>
            </div>
            <nav class="navegacion-principal">
                <a href="conferencia.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a href="invitados.php">Invitados</a>
                <a href="registro.php">Reservaciones</a>
            </nav>
        </div>
    </div>
    <!--Barra-->