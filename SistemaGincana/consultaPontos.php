<?php

include_once("conectaBD.php");

if (isset($_GET['enviar'])) {
    $pontosAluno = $_GET['pontosAluno'];
    $alunoId = $_GET['aluno'];
    $dia = $_GET['dia'];
    $tabela = "alunos";
    $campos = "pontos";

    // Verificar se o aluno já está na tabela
    $verificaAluno = "SELECT * FROM $tabela WHERE idAlunos = '$alunoId'";
    $resultadoVerificacao = mysqli_query($conexao, $verificaAluno);

    if (mysqli_num_rows($resultadoVerificacao) > 0) {
        // O aluno já está na tabela, então podemos adicionar os pontos
        $sql = "UPDATE $tabela SET $campos = $campos + '$pontosAluno' WHERE idAlunos = '$alunoId'";
        $instrucao = mysqli_query($conexao, $sql);

        if (!$instrucao) {
            die('Query inválida ' . mysqli_error($conexao));
        } else {
            // Pontos adicionados com sucesso
            
        }
    } else {
        // Aluno não encontrado na tabela. Pode ser exibida uma mensagem de erro.
        $mensagemErro = "Aluno não encontrado na tabela. Pontos não adicionados.";
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
                        <input type="radio" name="sala-ano" value="1">1 °informática<br>
                        <input type="radio" name="sala-ano" value="2">2 informática<br>
                        <input type="radio" name="sala-ano" value="3">3 informática<br><br>
                        <?php
                        // require_once
                        
                        $resultDia = $conexao->query("SELECT * FROM diasGincana");
                        $resultAluno = $conexao->query("SELECT * FROM alunos");
                        ?>

                        <select name="aluno">
                            <?php
                            if (isset($_GET["enviar"])) {
                                while ($row = $resultAluno->fetch_assoc()):
                                    ?>
                                    <?php
                                    echo "<option value='" . $row['idAlunos'] . "'>" . $row['nome'] . "</option>";

                                    ?>

                                    <?php
                                endwhile;
                            } ?>
                        </select><br><br>
                        <select name="dia">
                            <?php
                            while ($row = $resultDia->fetch_assoc()) {
                                echo "<option value='" . $row['idDiaGincana'] . "'>" . $row['dia'] . "</option>";
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
                                    <?php

                                    $sqlAluno = "select * from $tabela";
                                    $instrucaoAluno = mysqli_query($conexao, $sqlAluno);
                                    foreach ($instrucaoAluno as $exibe) {
                                        echo "<p>" . $exibe['idAlunos'] . "</p>";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <?php

                                    $sqlAluno = "select * from $tabela";
                                    $instrucaoAluno = mysqli_query($conexao, $sqlAluno);
                                    foreach ($instrucaoAluno as $exibe) {
                                        echo "<p>" . $exibe['nome'] . "</p>";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <p>pontos aluno</p>
                                    <?php

                                    $sqlAluno = "select * from $tabela";
                                    $instrucaoAluno = mysqli_query($conexao, $sqlAluno);
                                    foreach ($instrucaoAluno as $exibe) {
                                        echo "<p>" . $exibe['pontos'] . "</p>";
                                    }
                                    ?>
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