<!--
CONSULTAPONTOS (trocar esse nome e do css)

Registro dos dados/consulta
o aluno ver a pontuação na tabela dele
 -->

 <?php

    include_once("conectaBD.php");

    $tabela= "diasGincana";
    $campos= "dia";

    

    if(isset($GET['enviar'])){
        $pontosAluno = $_GET['pontosAluno'];
        $diaGincana = $_GET['diaGincana'];

        //Script para inserir um registro na tabela no Banco de Dados

        $sql = "INSERT INTO $tabela ()
        VALUES ()";


        //executando instrução sql
        $instrucao = mysqli_query($conexao,$sql);
        //concluindo operação

        if (!$instrucao) {
            die('Query inválida '.mysqli_error($conexao));
        } else {
            mysqli_close($conexao);
            header('Location: index.php'); 
            // O header leva para a pagina inic
        }
    }   

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Gincana</title>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/forms.css">

</head>
<body>

    <div class="container">

        <header>

            <div id="header-imgs"> <!-- começo imgs cabeçalho-->

                <div id="area-logo">
                    <img src="imagens/etec.png" alt="logo Etec Antônio Furlan" width="150px">
                </div>
                <div id="img-csp">
                   <img src="imagens/cps.png" alt="imagem centro paula souza" width="150px" >
                </div>
                <div>
                    <img src="imagens/sp.png" alt="" width="300px" srcset="">
                </div>

            </div><!-- fim imgs cabeçalho-->

        </header>

        <main>
           
            <form action="" id="background-red">
                <div id="background-white">
                    <h2>Pontos da gincanas</h2>
                    <input type="text" name="pontosAluno" class="input pontos" placeholder="quantidade de pontos"><br>
                    <input type="date" name="diaGincana">
                    <!-- <input type="text" name="y" id="y" class="input senha" placeholder="senha "> -->
                    <div id="inputs-radio"> 
                        <input type="radio" name="sala-ano" value="1 informática">1 °informática<br>
                        <input type="radio" name="sala-ano" value="2 informática">2 informática<br>
                        <input type="radio" name="sala-ano" value="3 informática">3 informática<br>
                    </div>
                    <button name="enviar" type="submit">Enviar</button>
                </div>
        </main>

    </div>

</body>
</html>