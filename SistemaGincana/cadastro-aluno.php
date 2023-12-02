<?php
  include_once("conecta-db.php");

  if(isset($_GET['enviar'])){
    $nome = $_GET['nome'];
    $idade = $_GET['idade'];
    $idTurma = $_GET['turma'];

    //Script para inserir um registro na tabela no Banco de Dados

    $sql = "INSERT INTO Aluno (nome, idade, idTurma) VALUES ('$nome', $idade, $idTurma)";

    //executando instrução sql
    $instrucao = mysqli_query($conexao,$sql);
    //concluindo operação

    if (!$instrucao) {
      echo die('Query inválida '.mysqli_error($conexao));
    } else {
      mysqli_close($conexao);
      header('Location: cadastro-aluno.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Gincana</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/cadastro-aluno.css">
  </head>

  <body>
    <header>
      <img src="imagens/etec.png" alt="logo Etec Antônio Furlan" width="150px">
      <img src="imagens/cps.png" alt="imagem centro paula souza" width="150px">
      <img src="imagens/sp.png" alt="" width="300px" srcset="">
    </header>

    <main>
      <section class="box">
        <form method="GET">
          <h2>Cadastro do Aluno</h2>

          <input type="text" name="nome" placeholder="Nome completo" required>
          <input type="number" name="idade" placeholder="Sua idade" max="20" min="15" required>

          <select name="turma" required>
            <?php
              $result = $conexao->query("SELECT * FROM Turma");

              while($row = $result->fetch_assoc()){
                echo "<option value=".$row['idTurma'].">".$row['turma']."</option>";
              }
            ?>
          </select>

          <button name="enviar" class="btn" type="submit">Enviar</button>
        </form>
      </section>
    </main>
  </body>
</html>
