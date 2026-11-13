<?php

//incluir la información del archivo conexion.php
include("conexion.php");

//mandamos a llamar la funcion conectar para ejecutarla
$conexion = conectar();

//consulta
$sql = "SELECT * FROM alumnos";

//ejecutar la consulta y tendremos acceso a la conexión 
$query = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de alumnos</title>
</head>
<body>
    <h1>Tabla de alumnos</h1>
    <table border="1" >
        <thead style="background-color: #7d95ba; text-align: center;">
            <tr>
            <th>Id</th>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody style="text-align: center;"> 
            
            <?php
                while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['matricula'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['apellido_p'] ?></td>
                <td><?php echo $row['apellido_m'] ?></td>
                <td><?php echo $row['edad'] ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                    <br>
                    Editar
                </td>
            </tr>
            <?php
                }
            ?> 

        </tbody>
    </table>

    <h1>Formulario</h1>
    <form action="insertar.php" method="POST">
        <input type="text" class="form-control" name="matricula" placeholder="Matricula">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)">
        <input type="text" class="form-control" name="apellido_p" placeholder="Apellido Paterno">
        <input type="text" class="form-control" name="apellido_m" placeholder="Apellido Materno">
        <input type="text" class="form-control" name="edad" placeholder="Edad">
        <button type="submit">Guardar</button>
    </form>

        
</body>
</html>