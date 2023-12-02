<?php
  include_once("conecta-db.php");

  //tabela no banco de dados
  $tabela="alunos";
  //define campos do insert
  $campos = "nome, idade, idTurma";

  // se o botão for pressionado
  if(isset($_GET['enviar'])){
    $nomeAluno = $_GET['nomeAluno'];
    $idadeAluno = $_GET['idadeAluno'];
    $idTurmas = $_GET['turmas'];

    //Script para inserir um registro na tabela no Banco de Dados

    $sql = "INSERT INTO $tabela ($campos) VALUES ('$nomeAluno', $idadeAluno, $idTurmas)";
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

          <input type="text" name="nomeAluno" class="input nome" placeholder="Nome completo">
          <input type="number" name="idadeAluno" class="input idade" placeholder="sua idade" max="18" min="15">

          <select name="turmas" >
            <option value="1">1º INFO</option>
            <option value="2">2º INFO</option>
            <option value="3">3º INFO</option>
            <option value="1">1º ADM</option>
            <option value="2">2º ADM</option>
            <option value="3">3º ADM</option>
          </select>

          <button name="enviar" class="btn" type="submit">Enviar</button>
        </form>
      </section>
    </main>
  </body>
</html>
