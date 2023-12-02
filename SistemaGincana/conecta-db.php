<?php
	//parametros
	$servidor = "localhost";
	$baseDados = "gincana";
	$usuario = "root";
	$senha = "";
	
	//criando conexao
	$conexao = mysqli_connect($servidor, $usuario, $senha, $baseDados);
	
	//checando conexao
	if (!$conexao) {
		die("Conexão falhou: ".mysqli_connect_error());
  }
?>
