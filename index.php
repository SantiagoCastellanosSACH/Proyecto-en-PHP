<!-- Primara clase con instructor nicolas saldarriaga -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Inicio de Sesión</h1>

    <form action="" method="post">
        <input type="text" name="user" placeholder="Usuario" require>
        <br/> <br/>
        <input type="password" name="pass" placeholder="Contraseña" require>
        <br/> <br/>
        <input type="submit" value="iniciar">
    </form>

    <?php

    //Array para guardar varios objetos
    $user = array ();
    $pass = array ();

    $user [0] = "Santiago";
    $user [1] = "Daniela";
    $user [2] = "Mateo";

    $pass [0] = "santi-1234";
    $pass [1] = "dani-1234";
    $pass [2] = "mateo-1234";

    //Condicional para recibir datos
    if (isset($_POST["user"]) && isset ($_POST["pass"])) {

        $ban = false;

        //ciclo para aumentar la posicion del array
        for ($i = 0; $i <= 2; $i++) {

            //Condicional para validar los datos que se reciben
            if ($_POST["user"] == $user[$i] && $_POST["pass"] == $pass[$i]) {
                $ban = true;
                break; //cuando la bandera es verdadera se detiene el ciclo
            }
        }

        //Condicional, cuando la bandera es de valor verdadero se da bienvenida, y cuando es falso da un error.
        if ($ban == 1) {
            echo "Bienvenido :) <br> ";
        } else { 
            echo "Error, Usuario y/o Contraseña incorrectos :( <br> ";
        }
        
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>