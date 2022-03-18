<?php

session_start();
include_once("conexão.php");

if(isset($_POST['email']) || isset($_POST['senha'])){

		if(strlen($_POST['email']) == 0){
			echo "Preencha seu e-mail";
		}else if(strlen($_POST['senha']) == 0){
			echo "Preencha sua senha";
		} else {

			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
			$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
			$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
			$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_NUMBER_INT);

			$insert_usuario = "INSERT INTO usuarios (nome, email, cpf, cep, idade, senha) VALUES ('$nome', '$email', '$cpf', '$cep', '$idade', '$senha')";

			$inserir_usuario = mysqli_query($mysqli, $insert_usuario);



			if (mysqli_insert_id($mysqli)) {
			$_SESSION['mensagem'] = "Usuário cadastrado com sucesso";
			header("Location: home.php");
			}else{
			header("Location: cadastro.php");
}
}
}
