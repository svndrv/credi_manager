<?php 
session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    
    <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    <a href="index.php" class="btn btn-danger">Volver</a>

    <h1><?php echo $_SESSION['usuario'] ?></h1>
    <h1>Hola <?php echo $_SESSION['nombres'],  $_SESSION['apellidos'] ?></h1>
    <h2>ACA SE HARA EL DASHBOARD DE LOS EMPLEADOS</h2>
    
</body>
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
</html>
