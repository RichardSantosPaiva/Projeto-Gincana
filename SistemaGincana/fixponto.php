<!-- 

Criei a página FixPonto com propósito de concertar a pontuação,
E fazer o crud mais pra frente .. n lembro. A página de referência/original
é a indexPHP.php(sergiola)

-->


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pontos para gincana</title>
</head>
<body>
    <form action="" method="GET">
    <h1>Pontos da gincana</h1>
    <input type="number" name="ponto" id="ponto"><br><br>
    <label>1 info</label>
    <input type="radio" name="curso" id="1 info" value="1">
    <label>2 info</label>
    <input type="radio" name="curso" id="2 info" value="2">
    <label>3 info</label>
    <input type="radio" name="curso" id="3 info" value="3"><br><br>

    <input type="submit" name="enviar" value="enviar">

    </form>
</body>
</html>

<?php 
    if(isset($_GET['enviar'])){
       
        $pontos = $_GET['ponto'];
        echo "<p>vc pontou $pontos</p>";

        
    };
?>
