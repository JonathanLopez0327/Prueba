<?php 
    include "database.php";

    if(isset($_POST['id'])) {

        $id = $_POST['id'];

        $query = "DELETE FROM alumnos WHERE id_alumno = $id";

        $result = mysqli_query($conexion, $query);

        if(!$result) {
            die("Query Failed");
        } 

        echo "Eliminado Exitosamente";

    }
?>