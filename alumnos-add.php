<?php

     include('database.php'); 

     if (isset($_POST['name']) && isset($_POST['carrera']) && isset($_POST['grupo'])) {
          
        $nombre = $_POST['name'];
        $carrera = $_POST['carrera'];
        $grupo = $_POST['grupo'];

        $query = "INSERT INTO alumnos (nombre, carrera, grupo)
            VALUES('$nombre', '$carrera', '$grupo')
        ";

        $result = mysqli_query($conexion, $query);

        if  (!$result) {
            die("Query Failed");
        } 
            
        echo "Registro Exitoso...";
        
     }

?>