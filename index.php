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
    <h2 class="text-center">Pruebas inicio de sesión.</h2>
    <hr>
    <form action="" method="post">
      <div class="row g-9 align-items-center">
        <div class="col-auto">
          <label for="user" class="col-form-label"><i class="bi bi-person-circle"></i> Usuario</label>
          <input type="text" name="user" id="user" class="form-control" required>
        </div>
        <div class="col-auto">
          <label for="pass" class="col-form-label"><i class="bi bi-key"></i> Contraseña</label>
          <input type="password" name="pass" id="pass" class="form-control" required>
        </div>
        <div class="col-auto">
          <label for="iniciar" class="col-form-label"></label><br>
          <button type="submit" class="btn btn-success" id="iniciar"><i class="bi bi-hand-thumbs-up"></i> INICIAR</button>
        </div>
      </div>
    </form>
    <br />

    <?php
    session_start();

      //"isset" Se usa para verificar si una variable está definida. True si esta definida y FALSE si no está definida.
    if (isset($_POST["user"]) && isset($_POST["pass"])) {

      include_once("./usuario.php"); // "include_once" sirve para que este archivo se incluya solo una vez.
      $users = new usuario($_POST["user"], $_POST["pass"]);

      if ($users->iniciar_sesion() == 1){
        /*$_SESSION: es una variable superglobal para almacenar datos de forma persistente
                     a través de varias páginas en un sitio web. */
        $_SESSION["status"] = true;
        $_SESSION["nombre"] = $users->getUser();
        header("Location: ./home.php");
      } else {
        echo '
        <script>
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "No se ha podido iniciar sesión",
            });
        </script>
        ';
      }
    }
    ?>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>