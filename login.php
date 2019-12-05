<?php

	// Incluindo scripts necessários
	include('./req/DB.php');
	include('./req/Espectador.php');
	include('./req/Usuario.php');
	include('./req/Administrador.php');
	include('./req/Utils.php');
	
	// Definindo valores padrao
	$erro_login = false;
	$email = '';
	$senha = '';

	// Verificando se form foi submetido
	if($_POST){

		// Lendo os valores do POST para variáveis;
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		// Carregando usuário da base
		$u = Utils::loadFromEmail($_POST['email']);

		// Tentando logar o usuário
		if($u && $u->logar($_POST['email'],$_POST['senha'])){
			
			// Criando o session
			session_start();
			$_SESSION['usuario'] = $u;

			// Redirecionando para a home
			header('location: home.php');

		} else {
			$erro_login = true;
		}
		
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Chat de FS</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="teal">
	<form method="POST" class="row">
		<div class="col s12 m6 offset-m3">
			<div class="card">
				<div class="card-content">
					<span class="card-title"></span>
					
					<div class="input-field">
						<!-- caso campo esteja inválido, adicionar class invallid -->
						<input placeholder="E-mail" type="email" name="email" value="<?= $email ?>">
					</div>
					
					<div class="input-field">
						<input placeholder="Senha" type="password" name="senha" value="<?= $senha ?>">
						<?php if($erro_login):  ?>
						<span class="helper-text red-text">Email ou senha inválidos</span>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="card-action">
					<button type="submit" class="waves-effect waves-light btn">Entrar</button>
				</div>
			</div>
		</div>
	</form>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		document.addEventListener(
			'DOMContentLoaded',
			function() {
				var elems = document.querySelectorAll('select');
				var instances = M.FormSelect.init(elems, {});
			}
		);
	
	</script>
</body>
</html>