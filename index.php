<?php
define('ROOT_PATH', __DIR__ . '/'); // Define ROOT_PATH como la ruta del directorio actual

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsjtdg1G4PrBn1O_5Z0TqkNcxuezWWLfk8-A&s" />
    <link rel="stylesheet" href="/GESTION/assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
    <title>Digitaliza UDH</title>
</head>

<body>
    <div class="main-content">
        <!-- Incluir el header -->
        <?php
        $header_path = ROOT_PATH . 'includes/header.php';
        if (file_exists($header_path)) {
            include($header_path);
        } else {
            echo "No se encontró el archivo header.php en la ruta: " . $header_path;
        }
        ?>

        <!-- Incluir navbar Horizontal fijado al tocar borde-->
        <?php
        $navbarH_path = ROOT_PATH . 'components/navbarH.php';
        if (file_exists($navbarH_path)) {
            include($navbarH_path);
        } else {
            echo "No se encontró el archivo navbarH.php en la ruta: " . $navbarH_path;
        }
        ?>

        <!-- Incluir sub-navbar Horizontal-->
        <?php
        $navbarH_path = ROOT_PATH . 'components/subnavbar.php';
        if (file_exists($navbarH_path)) {
            include($navbarH_path);
        } else {
            echo "No se encontró el archivo subnavbar.php en la ruta: " . $navbarH_path;
        }
        ?>
        <!-- Incluir cuerpo-->

        <?php
        $navbarH_path = ROOT_PATH . 'views/public.php';
        if (file_exists($navbarH_path)) {
            include($navbarH_path);
        } else {
            echo "No se encontró el archivo subnavbar.php en la ruta: " . $navbarH_path;
        }
        ?>
        <?php include 'includes/footer.php'; ?>
        <script src="assets/js/script.js"></script>
</body>

</html>