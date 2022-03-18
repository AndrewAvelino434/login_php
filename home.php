<?php

include('protect.php');



?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<header>
		<div id="bemvindo">
	<h1 >BEM VINDO, <?php echo $_SESSION["nome"]; ?></h1>

		<p>
			<a id="sair" href="logout.php">Sair</a>
		</p>

	</div>
	</header>


	<div class="consulta">
	<form class="login" method="POST" action="cons_aluno.php">
	<h2>Painel de consulta</h2>
		<label>Por qual filtro deseja pesquisar?</label>
		 	<select class="log" name="filtro">
		 		<option value="0"> - - </option>
		 		<option value="1">Nome</option>
		 		<option value="2">Email</option>
		 		<option value="3">Matrícula</option>
		 		<option value="4">Curso</option>
		 		<option value="5">Idade</option>
		 	</select>
		 	<br>
		 	<label>Insira a busca:</label>
		 	<input type="text" name="valor">
		<input type="submit" value="Consultar">

	</form>

	</div>


<!--	<a id="cons_alunos" href="cons_aluno.php">Consultar alunos</a><-->


	



	
</body>

</html>