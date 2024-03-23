<?php

//CLASE
class usuario
{
    //Atributos
    private $user;
    private $pass;

    //Metodos
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
        return $resultado->num_rows;
    }
}
/*  */