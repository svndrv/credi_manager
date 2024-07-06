<?php 

    session_start();
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrapcss/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
    <title>Buró Group | Inicio</title>
    <link rel="icon" href="img/icolo-burogroup-b-white.ico">
</head>

<body>

    <?php require "includes/navbar.php" ?>
    <?php require "views/home-cover.php" ?>
    <?php require "includes/carrusel.php" ?>
    <?php require "views/home-body.php" ?>
    <?php require "includes/carrusel.php" ?>
    <?php require "includes/float-iconos.php" ?>

</body>

<?php require "includes/footer.php" ?>

<!-- BOOSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- FONTAWESOME -->
<script src="https://kit.fontawesome.com/2314719ba4.js" crossorigin="anonymous"></script>
<!-- JS -->
<script src="js/app.js"></script>
<!-- EMAILJS -->
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

</html>

