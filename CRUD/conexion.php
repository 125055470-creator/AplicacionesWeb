<?php   
    //Creamos una función
    function conectar(){
        //Información del servidor
        $host = "localhost";
        $user = "root";
        $password = "";

        //Base de datos
        $db = "aw221";

        //Conexión
        $conexion = mysqli_connect($host, $user, $password);

        //Le vamos a decir que BD y la información de 
        mysqli_select_db($conexion, $db);

        return $conexion;
    }
?>