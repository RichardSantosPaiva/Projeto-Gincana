

<?php
    //conecta ao banco
    include_once("conectaBD.php");
    //tabela no banco de dados
    $tabela="alunos";
    $campos="nome";


    // se o botão for pressionado
    if(isset($_GET['enviar'])){
        $nome = $_GET['nomeAluno'];
        //Script para inserir um registro na tabela no Banco de Dados
        $sql = "INSERT INTO $tabela ($campos)
                VALUES ('$nome')";
                
        //executando instrução sql

        $instrucao = mysqli_query($conexao,$sql);
        //concluindo operação

        if (!$instrucao) {
            die('Query inválida '.mysqli_error($conexao));
        } else {
            mysqli_close($conexao);

 
            echo "<a href='index.php' id='linkVoltar'>Voltar</a>";
            echo "$nome adicionado com sucesso'";
            exit;
        
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Gincana</title>
    <!-- <link rel="stylesheet" href="css/cadastro.css"> -->
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/forms.css">

    <style>
   a {
    background-color: rgb(180, 178, 178);
    border: 0px;
    color: rgb(125, 124, 124);
    display: block;
    font-size: 1.6em;
    font-weight: 300;  
    padding: 10px;
    margin: 30px  auto 0px auto;
    width: 400px;
    text-decoration: none;
    transition: 0.2s  background-color ;
    text-align: center;
}

a:hover{
    color: white;
    background-color: rgb(255, 0, 0,0.8) ;
    outline: 0px;
    border: 0px;
}


    </style>
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
            <form action="" id="background-red" method="GET">
                <div id="background-white">
                    <h2>Cadastro do Aluno</h2>
                    <input type="text" name="nomeAluno" class="input nome" placeholder="Nome completo">
                    <input type="number" name="idadeAluno" class="input idade" placeholder="sua idade" max="18" min="15">
                    <button name="enviar" type="submit">Enviar</button>
                     <a href="index.php" id="linkVoltar">Voltar</a>
                </div>
        </main>

    </div>


</body>
</html>