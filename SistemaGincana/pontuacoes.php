<?php
  include_once("conectaBD.php");

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
            /* $resultDia = $conexao->query("SELECT * FROM diasGincana"); */
            /* $resultAluno = $conexao->query("SELECT * FROM alunos"); */
          ?>

          <select name="aluno" required>
            <?php
              /* while ($row = $resultAluno->fetch_assoc()) { */
              /*   echo "<option value='" . $row['idAlunos'] . "'>" . $row['nome'] . "</option>"; */
              /* } */
            ?>
          </select>

          <select name="dia" required>
            <?php
              /* while ($row = $resultDia->fetch_assoc()) { */
              /*   echo "<option value='" . $row['idDiaGincana'] . "'>" . $row['dia'] . "</option>"; */
              /* } */
            ?>
          </select>

          <button name="enviar" class="btn" type="submit">Enviar</button>
        </form>
      </section>
    </main>
  </body>
</html>
