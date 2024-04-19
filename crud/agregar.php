<!-- PAGINA DE AGREGAR O CREAR -->

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <p>Usted esta en la sección de CREAR</p>
        <br />

        <?php
            $id = null;
            $n_doc = null;
            $t_doc = null;
            $nom = null;
            $apell = null;
            $genero = null;
            $tel = null;
            $correo = null;

            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $n_doc = $_GET["n_doc"];
                $t_doc = $_GET["t_doc"];
                $nom = $_GET["nom"];
                $apell = $_GET["apell"];
                $genero = $_GET["genero"];
                $tel = $_GET["tel"];
                $correo = $_GET["correo"]; 
        }
        ?>

        <form action="" method="post">

            <div class="form-floating mb-3">
                <input type="hidden" name="id_org" value="<?php echo $id; ?>">
                <input type="number" class="form-control" name="id" id="id" value="<?php echo $id; ?>" required>
                <label for="id">ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="n_doc" id="n_doc" value="<?php echo $n_doc; ?>" required>
                <label for="n_doc">Numero de documento</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="t_doc" id="t_doc" aria-label="Floating label select example" required>
                    <option value="<?php echo $t_doc; ?> "> <?php echo $t_doc; ?></option>
                    <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                    <option value="Cédula de extranjeria">Cédula de extranjeria</option>
                    <option value="Otro">Otro</option>
                </select>
                <label for="t_doc">Tipo de documento</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $nom; ?>" required>
                <label for="nom">Nombres</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="apell" id="apell" value="<?php echo $apell; ?>" required>
                <label for="apell">Apellidos</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="genero" id="genero" aria-label="Floating label select example" required>
                    <option value="<?php echo $genero; ?> "> <?php echo $genero; ?></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
                <label for="genero">Genero</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="tel" id="tel" value="<?php echo $tel; ?>" required>
                <label for="tel">Telefono</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $correo; ?>" required>
                <label for="correo">Correo</label>
            </div>

            <div class="input-group mb-3">
                <div class="form-floating mb-3">
                    <button type="submit" class="btn btn-warning" name="crear" id="crear"><i class="bi bi-plus-circle"></i> CREAR</button>
                    <a href="./consultar.php" class="btn btn-secondary" id="editar">Ver tabla</a>
                </div>
            </div>

            <?php
        include_once "../conexion.php";

        if (isset($_POST["crear"])) {

            $sql = "SELECT * FROM paciente WHERE id = '".$_POST["id"]."'";
            $respuesta = $conn->query($sql);
            //echo "Respuesta: ".$respuesta->num_rows;

            if ($respuesta->num_rows == 0) {
                $sql = "INSERT INTO `paciente` (`id`, `n_documento`, `tipo_documento`, `nombres`, `apellidos`, `genero`, `telefono`, `correo`) 
                    VALUES ('".$_POST["id"]."', '".$_POST["n_doc"]."', '".$_POST["t_doc"]."', '".$_POST["nom"]."', '".$_POST["apell"]."', 
                            '".$_POST["genero"]."', '".$_POST["tel"]."', '".$_POST["correo"]."')";
                echo ' <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Registro guardado exitosamente",
                    showConfirmButton: false,
                    timer: 3000
                  });
                </script> ';
                            
            $conn->query($sql);
            } else {
                echo '
                <script>
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "Numero de ID ya existente",
                    });
                </script>
                ';
            }
            header("Location: consultar.php");
        }
    ?>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>