<?php
if(isset($_POST["nombre"])){

    require("conecta.php");

    $nombre = $_POST["nombre"];
    $pwd = $_POST["contraseña"];


    $sql = "INSERT INTO Persona(nombre,pwd) values (:nombre,:pwd)";

    $datos = array(
        "nombre"=>$nombre,
        "pwd"=>$pwd
    );

    $stmt = $conn->prepare($sql);
    
    if($stmt->execute($datos) != 1) {
        print("No se pudo dar de alta");
        exit(0);
    }
    if($stmt->rowCount() == 1) {
        session_start();
        $_SESSION["nombre"] = $nombre;
        session_write_close();
        header("Location: index.php");
        exit(0);
    }
}



?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
</head>
<body>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="contraseña">Contraseña</label>
        <input type="text" name="contraseña" id="contraseña">
        <button type="submit">Confirmar</button>
    </form>
</body>
</html>