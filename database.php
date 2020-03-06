<?php

    $conexion = mysqli_connect(
        'localhost',
        'root',
        '',
        'itic'
    );

    if (!$conexion) {
        echo "Error al conectar";
        exit();
    }

?>