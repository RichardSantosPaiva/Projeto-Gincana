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
    <input type="number" name="ponto" id="ponto">
    <input type="text" name="senha" id="senha">
    <input type="submit" name="mostrar" id="mostrar">
    <label>1 info</label>
    <input type="radio" name="curso" id="1 info" value="1">
    <label>2 info</label>
    <input type="radio" name="curso" id="2 info" value="2">
    <label>3 info</label>
    <input type="radio" name="curso" id="3 info" value="3">
    </form>
    <?php
    

    if(isset($_GET['mostrar'])){
        
        $pontosAdi = $_GET['ponto'];
        $senha = $_GET['senha'];
        $curso = $_GET['curso'];
    //Pontos da sala
    $PontosPri_Info = array(1, 1, 0);
    $PontosSeg_Info = array(1, 1, 1);
    $PontosTer_Info = array(1, 0, 0);
    //Pontos totais
    $Pri_Info_total = $PontosPri_Info[0] + $PontosPri_Info[1] + $PontosPri_Info[2];
    $Seg_Info_total = $PontosSeg_Info[0] + $PontosSeg_Info[1] + $PontosSeg_Info[2];
    $Ter_Info_total = $PontosTer_Info[0] + $PontosTer_Info[1] + $PontosTer_Info[2];
    //adicionando pontos pra salas
    
    //autenticação de senha
    if($senha == "etec" ){

        switch ($curso){
            case "1":
            $PontosPri_Info[2] = $PontosPri_Info[2]+ $pontosAdi;
            $Pri_Info_total = $Pri_Info_total + $pontosAdi;
                echo "curso escolhido: 1 info<br>adicionando $pontosAdi pontos na tabela";
            break;
            case "2":
            $PontosSeg_Info[2] = $PontosSeg_Info[2] + $pontosAdi;
            $Seg_Info_total = $Seg_Info_total + $pontosAdi;
                echo "curso escolhido: 2 info<br>adicionando $pontosAdi pontos na tabela";
            break;
            case "3":
            $PontosTer_Info[2] =  $pontosAdi+ $PontosTer_Info[2];
            $Ter_Info_total = $Ter_Info_total + $pontosAdi;
                echo "curso escolhido: 3 info<br>adicionando $pontosAdi pontos na tabela";
            break;
        }
        echo"<br>Primeira fase, Segunda Fase, Terceira Fase";
        echo "<br><br><th>1 Info</th>:";
        for ($i = 0 ; $i <= 2 ; $i++){
            echo "<th>$PontosPri_Info[$i],</th>";
        }
        echo "<br>";
        
        echo "<br><br><th>2 Info</th>:";
        for ($i = 0 ; $i <= 2 ; $i++){
            echo "<th>$PontosSeg_Info[$i],</th>";
        }
        echo "<br>";
        
        echo "<br><br><th>3 Info</th>:";
        for ($i = 0 ; $i <= 2 ; $i++){
            echo "<th>$PontosTer_Info[$i],</th>";
        }
        echo "<br><br>";
       


    if ($Pri_Info_total > $Seg_Info_total && $Pri_Info_total > $Ter_Info_total && $Seg_Info_total > $Ter_Info_total) {
        echo "<b>Primeiro info:</b>$Pri_Info_total<br>";
        echo"<b>Segundo info:</b>$Seg_Info_total<br>";
        echo"<b>Terceiro info:</b>$Ter_Info_total<br>";
    }
    else if ($Pri_Info_total > $Seg_Info_total && $Pri_Info_total > $Ter_Info_total && $Seg_Info_total < $Ter_Info_total) {
        echo "<b>Primeiro info:</b>$Pri_Info_total<br>";
        echo"<b>Terceiro info:</b>$Ter_Info_total<br>";
        echo"<b>Segundo info:</b>$Seg_Info_total<br>";
        
    }
    if ($Seg_Info_total > $Pri_Info_total && $Seg_Info_total > $Ter_Info_total && $Pri_Info_total > $Ter_Info_total) {
        echo "<b>Segundo info:</b>$Seg_Info_total<br>";
        echo"<b>Primeiro info:</b>$Pri_Info_total<br>";
        echo"<b>Terceiro info:</b>$Ter_Info_total<br>";
    }
    else if ($Seg_Info_total > $Pri_Info_total && $Seg_Info_total > $Ter_Info_total && $Pri_Info_total < $Ter_Info_total) {
        echo "<b>Segundo info:</b>$Seg_Info_total<br>";
        echo"<b>Terceiro info:</b>$Ter_Info_total<br>";
        echo"<b>Primeiro info:</b>$Pri_Info_total<br>";
    }

    if ($Ter_Info_total > $Pri_Info_total && $Ter_Info_total > $Seg_Info_total && $Pri_Info_total > $Seg_Info_total) {
        echo "<b>Terceiro info:</b>$Ter_Info_total<br>";
        echo"<b>Primeiro info:</b>$Pri_Info_total<br>";
        echo"<b>Segundo info:</b>$Seg_Info_total<br>";
        
    }
    else if ($Ter_Info_total > $Pri_Info_total && $Ter_Info_total > $Seg_Info_total && $Pri_Info_total < $Seg_Info_total) {
        echo "<b>Terceiro info:</b>$Ter_Info_total<br>";
        echo"<b>Segundo info:</b>$Seg_Info_total<br>";
        echo"<b>Primeiro info:</b>$Pri_Info_total<br>";

    }

    if ($Pri_Info_total == $Seg_Info_total) {
        echo "Primeiro e Segundo Info empatados:<br>";
        echo"<b>Segundo lugar:</b>Terceiro info:$Ter_Info_total<br>";
        
    }

    else if ($Pri_Info_total == $Ter_Info_total) {
        echo "Primeiro e Terceiro Info empatados:<br>";
        echo"<b>Segundo lugar:</b>Segundo info:$Seg_Info_total<br>";
       
    }

    else if ($Seg_Info_total == $Ter_Info_total) {
        echo "Terceiro e Segundo Info empatados<br>";
        echo"<b>Segundo lugar:</b>Primeiro info:$Pri_Info_total<br>";

    }

    }

    else{
        echo"reveja seus pontos<br>";
    }
    
    }




    ?>
</body>
</html>