<!--
CONSULTAPONTOS (trocar esse nome e do css)

Registro dos dados/consulta
o aluno ver a pontuação na tabela dele
 -->

<?php

include_once("conectaBD.php");

$tabela = "diasGincana";
$campos = "dia";



if (isset($GET['enviar'])) {
    $pontosAluno = $_GET['pontosAluno'];
    $diaGincana = $_GET['diaGincana'];

    //Script para inserir um registro na tabela no Banco de Dados

    $sql = "INSERT INTO $tabela ()
        VALUES ()";


    //executando instrução sql
    $instrucao = mysqli_query($conexao, $sql);
    //concluindo operação

    if (!$instrucao) {
        die('Query inválida ' . mysqli_error($conexao));
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
    <link rel="stylesheet" href="css/tabela-pontos.css">    
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
                    <img src="imagens/cps.png" alt="imagem centro paula souza" width="150px">
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
                    <!-- <input type="text" name="y" id="y" class="input senha" placeholder="senha "> -->
                    <div id="inputs-radio">
                        <input type="radio" name="sala-ano" value="1 informática">1 °informática<br>
                        <input type="radio" name="sala-ano" value="2 informática">2 informática<br>
                        <input type="radio" name="sala-ano" value="3 informática">3 informática<br><br>
                        <?php
                        // require_once
                        
                        $resultDia = $conexao->query("SELECT * FROM diasGincana");
                        $resultAluno = $conexao->query("SELECT * FROM alunos");
                        ?>

                        <select>
                            <?php
                            while ($row = $resultDia->fetch_assoc()) {
                                echo "<option>" . $row['dia'] . "</option>";
                            }
                            ?>
                        </select><br><br>
                            <select>
                            <?php
                            while ($row = $resultAluno->fetch_assoc()) {
                                echo "<option>" . $row['nome'] . "</option>";
                            }
                            ?>
                        </select>

                    </div>

                    <button name="enviar" type="submit">Enviar</button>
                </div>
            </form>

            <div id="pontos" class="background-red-pontos">
                <div class="background-white-pontos">
                     
                    <div id="tabela-pontos">

                            <div id="pontos-alunos"><!-- comeco pontos alunos -->
                                <h3>Alunos</h3>

                                <div id="titulo-tbl-alunos"> <!-- começo cabecalho aluno-->
                                    <div>
                                        <h4>Id</h4>
                                    </div>
                                    <div>
                                        <h4>Nome</h4>
                                    </div>
                                    <div>
                                        <h4>Pontos individual</h4>
                                    </div>
                                </div> <!-- final cabecalho aluno-->
                                
                                <div id="dados-alunos"> <!--comeco dados alunos -->
                                    <div>
                                        <p>id aluno</p>
                                    </div>
                                    <div>
                                        <p>nome aluno</p>
                                    </div>
                                    <div>
                                       <p>pontos aluno</p>
                                    </div>
                                </div><!-- final dados alunos-->

                            </div><!--final ponto alunos -->

                            <div id="pontos-turma"> <!-- comeco pontos turma-->
                                <h3>Turma</h3>
                               
                                <div id="titulo-tbl-turma">
                                    <h4>pontos total</h4>
                                </div>
                                <div id="dados-turma">
                                    <p>pontos total da turma</p>
                                </div>

                            </div> <!-- fnal pontos turma-->

                    </div>

                </div>
            </div>
        </main>

    </div>

</body>

</html>