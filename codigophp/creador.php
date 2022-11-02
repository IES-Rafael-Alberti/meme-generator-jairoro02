<?php
    require("pruebalogin.php");
    require("conecta.php");
    if(isset($_POST['texto1'])){
        $cajas = $_GET['boxes'];
 
    

        $url = 'https://api.imgflip.com/caption_image';
        
        $textos = [];


        for($y = 1;$y<=$cajas;$y++){
            $texto = ["text" => $_POST["texto".$y.""], "color" => "#ff8484"];
            array_push($textos,$texto);

        }
        //The data you want to send via POST
        $fields = array(
                "template_id" => $_GET["id"],
                "username" => "fjortegan",
                "password" => "pestillo",
                "boxes" => $textos);


        //url-ify the data for the POST
        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $result = curl_exec($ch);

        //decode response
        $data = json_decode($result, true);

        //if success show image
        if($data["success"]) {
            $imgurl= $data["data"]["url"];
            $nombrepersona = $_SESSION["nombre"];
            $memefinal = $conn->query("SELECT id FROM Persona WHERE nombre = '$nombrepersona'");
            $personameme = $memefinal->fetch();
            $memenombre = $nombrepersona . date("dmyhis") .".jpg";
            file_put_contents("memillos/$memenombre", file_get_contents($imgurl));

            $sql = "INSERT INTO MEME(ruta,id_persona) VALUES (:ruta,:id_persona)";

            

            $datos = array(
                "ruta"=>"memillos/$memenombre",
                "id_persona" => $personameme["id"]
            );

            $stmt = $conn->prepare($sql);
            $stmt->execute($datos);

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
            echo("<button type='submit' value='Generar' width='30px'>Enviar</button>");

        ?>

    </form>
</body>
</html>