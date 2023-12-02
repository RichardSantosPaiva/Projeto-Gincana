<?php
  include_once("conecta-db.php");

  if (isset($_GET['enviar'])) {
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Gincana</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/pontuacoes.css">
  </head>

  <body>
    <header>
      <img src="imagens/etec.png" alt="logo Etec Antônio Furlan" width="150px">
      <img src="imagens/cps.png" alt="imagem centro paula souza" width="150px">
      <img src="imagens/sp.png" alt="" width="300px" srcset="">
    </header>

    <main>
      <section class="box">
        <form>
          <h2>Pontos da gincanas</h2>
          <input type="text" name="pontosAluno" placeholder="Quantidade de pontos">

          <?php
            $resultadoAluno = $conexao->query("SELECT * FROM Aluno");
            $resultadoDia = $conexao->query("SELECT * FROM Dia");
          ?>

          <select name="aluno" required>
            <?php
              if ($resultadoAluno->num_rows === 0) {
                echo "<option value='' disabled hidden selected>Nenhum aluno cadastrado</option>";
              } else {
                echo "<option value='' disabled hidden selected>Selecione um aluno</option>";

                while ($row = $resultadoAluno->fetch_assoc()) {
                  $sql = "SELECT turma FROM Turma WHERE idTurma = ". $row['idTurma'];
                  $result = $conexao->query($sql);

                  echo "<option value='" . $row['idAluno'] . "'>" . $row['nome'] . " (". $result->fetch_assoc()['turma'] . ")" . "</option>";
                }
              }
            ?>
          </select>

          <select name="dia" required>
            <?php
              if ($resultadoDia->num_rows === 0) {
                echo "<option value='' disabled hidden selected>Nenhuma data cadastrada</option>";
              } else {
                echo "<option value='' disabled hidden selected>Selecione uma data</option>";

                while ($row = $resultadoDia->fetch_assoc()) {
                  echo "<option value='" . $row['idDia'] . "'>" . $row['data'] . "</option>";
                }
              }
            ?>
          </select>

          <button name="enviar" class="btn" type="submit">Enviar</button>
        </form>
      </section>
    </main>
  </body>
</html>
