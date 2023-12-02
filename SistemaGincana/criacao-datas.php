<?php
  include_once("conectaBD.php");

  $tabela= "diasGincana";
  $campos= "dia";

  if(isset($_GET['enviar'])){
    $diaGincana = $_GET['diaGincana'];

    //Script para inserir um registro na tabela no Banco de Dados

    $sql = "INSERT INTO $tabela ($campos)
    VALUES ('$diaGincana')";


    //executando instrução sql
    $instrucao = mysqli_query($conexao,$sql);
    //concluindo operação

    if (!$instrucao) {
      die('Query inválida '.mysqli_error($conexao));
    } else {
      mysqli_close($conexao);
      header('Location: index.php');
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
  </head>
  <body>
    <header>
      <img src="imagens/etec.png" alt="logo Etec Antônio Furlan" width="150px">
      <img src="imagens/cps.png" alt="imagem centro paula souza" width="150px" >
      <img src="imagens/sp.png" alt="" width="300px" srcset="">
    </header>

    <main>
      <section class="box">
        <form>
          <h2>Fases da gincana</h2>

          <input type="date" name="diaGincana" class="input pontos" placeholder="Dias das fases"><br>

          <button name="enviar" class="btn" type="submit">Enviar</button>
        </form>
      </section>
    </main>
  </body>
</html>
