<!-- PAGINA DE ELIMINAR-->

<?php
session_start();
if ($_SESSION["status"] == false) {
    header("Location: ./index.php");
} else {
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto con PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container">
        <h2 class="text-center">Bienvenido/a... <?php echo $_SESSION["nombre"] . "." ?> </h2>
        <hr>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a href="./">
                    <!-- <img src="https://w7.pngwing.com/pngs/435/647/png-transparent-mouthwash-toothbrush-toothpaste-pepsodent-tooth-germ-gums-toothpaste-oral-hygiene.png" alt="" width="5%"> -->
                </a>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link btn btn-outline-warning me-2" href="../home.php"><i class="bi bi-house-fill"></i>  INICIO</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link btn btn-outline-secondary me-2" href="consultar.php">Consultar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-outline-secondary me-2" href="agregar.php">Agergar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-outline-secondary me-2" href="actualizar.php">Actualizar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-outline-secondary me-2" href="eliminar.php">Eliminar</a>
            </li>
          </ul>
                </div>
                <a class="btn btn-warning" href="../salir.php"><i class="bi bi-door-open"></i> CERRAR SESIÓN</a>
            </div>
        </nav>
        <p>Usted esta en la sección para eliminar los registros</p>
        <br />