<?php
    //Incluir la infromación del archivo conexión.php
    include("conexion.php");

    //mandamos a llamar la función conectar para ejecutarla
    $conexion = conectar();

    //Recibir los datos del formulario
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad = $_POST['edad'];

    //Insertar los datos en la base de datos
    $sql = "INSERT INTO alumnos (matricula, nombre, apellido_p, apellido_m, edad) VALUES ('$matricula', '$nombre', '$apellido_p', '$apellido_m', '$edad')";

    //Ejecutar la consulta
    $query = mysqli_query($conexion, $sql);

    //Comprobar y direccionar
    if($query){
        header("Location: alumnos.php");
    }
    else{
        echo"Error al insertar al alumno";
    }
?>