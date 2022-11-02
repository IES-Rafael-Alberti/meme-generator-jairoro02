<?php
    require("pruebalogin.php");
    require("conecta.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Página principal</title>
</head>
<body>
    <h1>Lista de memes</h1>
    <a href="recibir-json.php"><i class="fa-sharp fa-solid fa-plus"></i></a><br>
    <?php
        $nombrepersona = $_SESSION["nombre"];
        $buscaid = $conn->query("SELECT id FROM Persona WHERE nombre ='$nombrepersona'");
        $encuentraid = $buscaid->fetch();
        $id = $encuentraid["id"];
        
        $buscaimg = $conn->query("SELECT * FROM Meme WHERE id_persona = '$id'");
        $encuentraimg = $buscaimg->fetchAll(PDO::FETCH_ASSOC);

        foreach($encuentraimg as $img){
            $imagen = $img["ruta"];
            print("<table>");
            print("<tr>");
            print("<img width='150px' src='$imagen'>");
            print("</td>");
            print("</table>");
        }

    ?>
</body>
</html>