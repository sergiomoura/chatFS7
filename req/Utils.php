<?php

abstract class Utils {

	public static function criarUsuario(string $email, string $senha, int $nivel){

		// Criando objeto DB (conexão com o banco)
		$db = new DB();

		// Criptografando a guia possada
		$hash = password_hash($senha,PASSWORD_DEFAULT);

		// Defininfo a consulta sql
		$sql = "INSERT INTO usuarios (
					email,
					nivel,
					senha
				) VALUES (
					:email,
					:nivel,
					:senha
				);";

		
		// Tentando realizar a consulta
		// https://www.php.net/manual/pt_BR/language.exceptions.php
		try {

			// Preparando consulta
			$insert = $db->prepare($sql);
			
			// Executando consulta
			$insert->execute([
				'email' => $email,
				'nivel' => $nivel,
				'senha' => $hash,
			]);
			
		} catch(Exception $e) {

			// Imprimindo mensagem de erro
			echo($e->getMessage());

			// Retornando false para informar a falha na criação do usuário
			return false;
		}
		
		// Retornando true para informar sucesso na criação do usuário
		return true;
	}

	public static function loadFromEmail($email){
		$db = new DB();
		$query = $db->prepare("SELECT
														id,
														senha,
														nivel,
														email,
														bloqueado
													FROM
														usuarios
													WHERE
														email=:email");
		$executou = $query->execute([
			':email' => $email
		]);
		
		$dados = $query->fetch(PDO::FETCH_ASSOC);
		if($dados['nivel'] == 1){
			return new Administrador(
				$dados['id'],
				$dados['email'],
				$dados['senha'],
				$dados['bloqueado']);
		} elseif($dados['nivel'] == 2) {
			return new Usuario(
				$dados['id'],
				$dados['email'],
				$dados['senha'],
				$dados['bloqueado']);
		} else {
			return new Espectador(
				$dados['id'],
				$dados['email'],
				$dados['senha'],
				$dados['bloqueado']);
		}
	}
}