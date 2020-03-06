<?php

    include 'database.php';

    $query = "SELECT * FROM alumnos"; 

    $result = mysqli_query($conexion, $query);

    if (!$result) {

        die("Query Error" . mysqli_error($conexion));
    }

    $json = array();
    while  ($row = mysqli_fetch_array($result)) {

        $json[] = array(
            'id_alumno' => $row['id_alumno'],
            'nombre' => $row['nombre'],
            'carrera' => $row['carrera'],
            'grupo' => $row['grupo']
        );

    }
    
    $jsonString = json_encode($json);
    echo $jsonString;

?>