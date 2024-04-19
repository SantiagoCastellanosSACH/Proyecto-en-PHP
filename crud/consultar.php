<!-- PAGINA DE CONSULTA -->

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
        <div class="collapse navbar-collapse justify-content-center g-9" id="navbarNavDropdown">
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
    <p>Usted esta en la sección de CONSULTAR</p>

    <div class="d-flex justify-content-end">
    <a href="./agregar.php" class="btn btn-success mb-2">Agregar <i class="bi bi-plus-circle"></i></a> 
    </div>

    <div class="">
    <?php
      include_once "../conexion.php";

      $sql = "SELECT * FROM paciente";
      $resultado = $conn->query($sql);
      $row = $resultado->fetch_array();

      if(isset($_GET["id_eliminar"])) {
        $sql = "DELETE FROM paciente WHERE id = '".$_GET["id_eliminar"]."' ";
        $conn -> query($sql);
        header("Location: consultar.php");
      }

      echo '
          <table class="table table-striped">
              <tr>
                <th>ID</th>
                <th>N_Documento</th>
                <th>Tipo_Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Genero</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </th>
              </tr>
          ';

      while ($row = $resultado->fetch_array()) {
        echo '
              <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[1].'</td>
                <td>'.$row[2].'</td>
                <td>'.$row[3].'</td>
                <td>'.$row[4].'</td>
                <td>'.$row[5].'</td>
                <td>'.$row[6].'</td>
                <td>'.$row[7].'</td>
                <td > 
                  <td class="text-center"><a href="actualizar.php?id='.$row[0].'&n_doc='.$row[1].'&t_doc='.$row[2].'&nom='.$row[3].'&apell='.$row[4].'&genero='.$row[5].'
                  &tel='.$row[6].'&correo='.$row[7].'" > <i class="bi bi-pen fs-4"></i> </a></td>
              ';
    ?>
                  <td class="text-center"><a href="consultar.php?id_eliminar=<?php echo $row[0]; ?>" onclick = "return confirm ('¿Desea eliminar el registro?')" ><i class="bi bi-trash3 text-danger fs-4"></i></a> </td>
    <?php
        echo '
                </td>
              </tr>
        ';
      }
      echo '</table>';
    ?>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<!-- 
  <a href="agregar.php?id='.$row[0].'&n_doc='.$row[1].'&t_doc='.$row[2].'&nom='.$row[3].'&apell='.$row[4].'&genero='.$row[5].'&tel='.$row[6].'&correo='.$row[7].'" >Editar</a> | 
                  <a href="consultar.php" onclick = "return confirm ()" ><i class="bi bi-trash3"></i></a> 
 -->