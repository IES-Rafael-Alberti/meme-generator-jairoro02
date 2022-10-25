<?php

    require("pruebalogin.php");
?>
<?php
    if(isset($_POST['texto1'])){
        $cajas = $_GET['boxes'];
        for($x = 1;$x<=$cajas;$x++){
            $texto.$x = $_POST["texto'.$x.'"];
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creador</title>
</head>
<body>
    <form action="" method="post">
        <?php
            $url = $_GET['url'];
            $cajas = $_GET['boxes'];
            echo("<img width='300px' href='creador.php' src='" . $url . "'>");
            for($x = 1;$x<=$cajas;$x++){
                echo('<label for="texto'.$x.'">Texto '.$x.': </label>');
                echo('<input type="text" name="texto'.$x.'" id="texto'.$x.'">');
            }
            echo("<button type='submit' value='Generar' width='30px'></button>");

        ?>

    </form>
</body>
</html>