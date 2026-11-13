<?php

//Incluir la información del archivo conexión.php
include("conexion.php");

//mandamos a llamar la función conectar para ejecutarla
$conexion = conectar();

//Recibimos el id del alumno a eliminar desde la URL
$id = $_GET['id'];

//Consulta para eliminar el alumno con el id recibido
$sql = "DELETE FROM alumnos WHERE id = $id";

//Ejecutamos la consulta
$query = mysqli_query($conexion, $sql);

//Verificamos si la consulta se ejecutó correctamente y redirigimos a la página de alumnos.php, de lo contrario mostramos un mensaje de error
if($query){
    header("Location: alumnos.php");
} else {
    echo "Error al eliminar el alumno";
}

?>