<?php


include_once("conexão.php");

if(isset($_POST['email']) || isset($_POST['senha']) || isset($_POST['nome']) || isset($_POST['matricula']) || isset($_POST['cep']) || isset($_POST['idade']) || isset($_POST['curso'])){


		if(strlen($_POST['email']) == 0){
			echo "Preencha seu e-mail";
		}else if(strlen($_POST['senha']) == 0){
			echo "Preencha sua senha";
			}else if(strlen($_POST['nome']) == 0){
			echo "Preencha seu nome";
			}else if(strlen($_POST['matricula']) == 0){
			echo "Informe sua matrícula";
			}else if(strlen($_POST['cep']) == 0){
			echo "Preencha seu CEP";
			}else if(strlen($_POST['idade']) == 0){
			echo "Informe sua idade";
			}else if($_POST['curso'] == 0){
			echo "Informe seu curso";
		} else {

			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);
			$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
			$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
			$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_NUMBER_INT);
			$curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_NUMBER_INT);

			$insert_usuario = "INSERT INTO alunos (nomes, email, id, cep, idade, senha) VALUES ('$nome', '$email', '$matricula', '$cep', '$idade', '$senha')";

			$inserir_usuario = mysqli_query($mysqli, $insert_usuario);

			$insert_curso = "INSERT INTO aluno_curso (id_aluno, id_curso) VALUES ('$matricula', '$curso')";

			$inserir_curso = mysqli_query($mysqli, $insert_curso);



			if (mysqli_insert_id($mysqli)) {
			$_SESSION['mensagem'] = "Usuário cadastrado com sucesso";
			header("Location: index.php");
			}else{
			header("Location: cadastro.php");
			}
}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Tela de cadastro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<header>
	
		</header>
<div class="cadastro">
	<h2>Cadastre-se</h2>
	<form class="login" method="POST" action="">
		<label>Nome: </label><br>
		<input class="log" type="text" name="nome" placeholder="Nome completo"><br>
		 <label>E-mail:</label> <br>
		 <input class="log" type="email" name="email" placeholder="Seu E-mail">
		<br>
		<label>Curso</label>
		 	<select class="log" name="curso">
		 		<option value="0"> - - </option>
		 		<option value="1">Analise e desenvolvimento de sistemas</option>
		 		<option value="2">Medicina Veterinária</option>
		 		<option value="3">Sistemas de informação</option>
		 	</select>
		 	<br>
		<label>Matrícula: </label><br>
		<input class="log" type="text" name="matricula" placeholder="Digite sua matrícula" ><br>
		<label>CEP: </label><br>
		<input class="log" type="text" name="cep" placeholder="Digite seu CEP" ><br>
		<label>Idade: </label><br>
		<input class="log" type="int" name="idade" placeholder="Digite sua idade"><br>
		Senha: <br>
		<input class="log" type="password" name="senha" placeholder="Digite sua senha">
		<br>

		<input type="submit" value="Cadastrar">
		<a class="cad" href="index.php">Tem conta? Login</a>

	</form>

	</div>
<footer>
		
	</footer>
	
</body>

</html>