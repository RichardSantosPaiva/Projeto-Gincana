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
          <?php
            $sqlTableData = "SELECT Aluno.idAluno, Aluno.nome AS aluno_nome, Turma.turma, Dia.data, Pontos.pontos 
                   FROM Aluno
                   JOIN Turma ON Aluno.idTurma = Turma.idTurma
                   LEFT JOIN Pontos ON Aluno.idAluno = Pontos.idAluno
                   LEFT JOIN Dia ON Pontos.idDia = Dia.idDia
                   WHERE Dia.data IS NOT NULL
                   ORDER BY Aluno.idTurma ASC, Aluno.nome ASC, Dia.data ASC";

            $resultTableData = $conexao->query($sqlTableData);

            $tableData = [];

            if ($resultTableData->num_rows > 0) {
              while ($row = $resultTableData->fetch_assoc()) {
                $alunoId = $row['idAluno'];
                $data = $row['data'];
                $pontos = $row['pontos'];

                if (!isset($tableData[$alunoId])) {
                  $tableData[$alunoId] = [
                    'aluno_nome' => $row['aluno_nome'],
                    'turma' => $row['turma'],
                    'pontos' => [],
                    'total_pontos' => 0,
                  ];
                }

                $tableData[$alunoId]['pontos'][$data] = $pontos;

                $tableData[$alunoId]['total_pontos'] += $pontos;
              }
            }

            if (!empty($tableData)) {
              echo "<table border='1'>";
              echo "<tr><th>Aluno</th><th>Turma</th>";

              $dates = [];

              foreach ($tableData as $aluno) {
                $dates = array_merge($dates, array_keys($aluno['pontos']));
              }

              $dates = array_unique($dates);
              sort($dates);

              foreach ($dates as $date) {
                echo "<th>" . date('d/m/Y', strtotime($date)) . "</th>";
              }

              echo "<th>Total Pontos</th>";
              echo "</tr>";

              foreach ($tableData as $aluno) {
                echo "<tr>";
                echo "<td>" . $aluno['aluno_nome'] . "</td>";
                echo "<td>" . $aluno['turma'] . "</td>";

                foreach ($dates as $date) {
                  $pontos = isset($aluno['pontos'][$date]) ? $aluno['pontos'][$date] : '-';
                  echo "<td>" . $pontos . "</td>";
                }

                echo "<td>" . $aluno['total_pontos'] . "</td>";

                echo "</tr>";
              }

              echo "</table>";
            } else {
              echo "Nenhum registro encontrado.";
            }
          ?>
      </section>
    </main>
  </body>
</html>
