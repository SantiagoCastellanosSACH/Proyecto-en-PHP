<?php

//POO ("Ubicación", "Nombre", "Dato Confidencial", "Medio Ambiente")
$conn = new mysqli('localhost', 'root', '', 'dentimed');

echo "Prueba datos de la conexión: " . $conn->host_info;
