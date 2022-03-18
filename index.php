<?php
	include('conexão.php');

	if(isset($_POST['email']) || isset($_POST['senha'])){

		if(strlen($_POST['email']) == 0){
			echo "Preencha seu e-mail";
		}else if(strlen($_POST['senha']) == 0){
			echo "Preencha sua senha";
		} else {

			$email = $mysqli->real_escape_string($_POST['email']);
			$senha = $mysqli->real_escape_string($_POST['senha']);

			$sql_code = "SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'";
			$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

			$quantidade = $sql_query->num_rows;

			if($quantidade == 1) {

				$usuario = $sql_query->fetch_assoc();

				if(!isset($_SESSION)){
					session_start();
				}

				$_SESSION["id"] = $usuario["id"];
				$_SESSION["nome"] = $usuario["nomes"];

				header("Location: home.php");

			} else {
				echo "Falha ao logar! E-mail ou senha incorretos";
			}


		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Página principal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<header>
		
	</header>

	<div class="login-box">
	<h2>Login</h2>
	<form class="login" action="" method="POST">
		 Email: <br>
		<input class="log" type="text" name="email" placeholder="Digite seu e-mail">
		<br>

		Senha: <br>
		<input class="log" type="password" name="senha" placeholder="Digite sua senha">
		<br>

		<input type="submit" value="Entrar">

		<a class="cad" href="cadastro.php">Ou Cadastre-se</a>

	</form>
</div>

<footer>
		
	</footer>

</body>



</html>