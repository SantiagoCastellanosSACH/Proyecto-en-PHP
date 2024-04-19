<?php

//CLASE
class usuario
{
    //Atributos
    private $user;
    private $pass;

    //Metodos          "($_user, $_pass)": Estos son parametros
    function __construct($_user, $_pass)
    {
        $this->user = $_user;
        $this->pass = $_pass;
    }

    function iniciar_sesion()
    {
        include_once("./conexion.php");
        $sql = "SELECT * FROM dentista WHERE nombres = '" . $this->user . "' AND pass = '" . $this->pass . "' ";
        $resultado = $conn->query($sql);

        if ($resultado -> num_rows == 1) {
            $row = $resultado -> fetch_array();
            $this -> user = $row[3];
        }
        return $resultado->num_rows;
    }

    function getUser() {
        return $this->user;
    }
}
/*  */