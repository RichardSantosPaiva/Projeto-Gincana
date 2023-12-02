<?php
  include_once("conecta-db.php");

  if (isset($_GET['enviar'])) {
    $idAluno = $_GET['aluno'];
    $idDia = $_GET['dia'];
    $pontos = $_GET['pontosAluno'];

    $sqlCheckExisting = "SELECT * FROM Pontos WHERE idAluno = $idAluno AND idDia = $idDia";
    $resultCheckExisting = $conexao->query($sqlCheckExisting);

    if ($resultCheckExisting->num_rows > 0) {
      $row = $resultCheckExisting->fetch_assoc();
      $existingPontos = $row['pontos'];

      $sqlUpdate = "UPDATE Pontos SET pontos = $pontos WHERE idAluno = $idAluno AND idDia = $idDia";
      $conexao->query($sqlUpdate);
    } else {
      $sqlInsert = "INSERT INTO Pontos (idAluno, idDia, pontos) VALUES ($idAluno, $idDia, $pontos)";
      $conexao->query($sqlInsert);
    }

    header("Location: pontuacoes.php");
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
          <input type="number" name="pontosAluno" placeholder="Quantidade de pontos" required>

          <?php
            $resultadoAluno = $conexao->query("SELECT * FROM Aluno ORDER BY idTurma ASC, nome ASC");
            $resultadoDia = $conexao->query("SELECT * FROM Dia ORDER BY data ASC");
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

                  echo "<option value='" . $row['idAluno'] . "'>" . "[". $result->fetch_assoc()['turma'] . "] " . $row['nome'] . "</option>";
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
                  $data = new DateTimeImmutable($row['data']);

                  echo "<option value='" . $row['idDia'] . "'>" . $data->format('d/m/Y') . "</option>";
                }
              }
            ?>
          </select>

          <button name="enviar" class="btn" type="submit">Enviar</button>
        </form>
      </section>

      <section class="box">
        <ul></ul>
      </section>
    </main>
  </body>
</html>
