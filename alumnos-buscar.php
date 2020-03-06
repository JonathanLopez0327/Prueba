<?php 
    include "database.php";

    $search = $_POST['search'];

    if  (!empty($search)) {
        $query = "SELECT * FROM alumnos WHERE nombre LIKE '%$search%'";

        $result = mysqli_query($conexion, $query);

        if  (!$result)  {
            die('Query Error'. mysqli_error($conexion));
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
    }
?>