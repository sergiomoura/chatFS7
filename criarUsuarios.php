<?php 
	include('./req/DB.php');
	include('./req/Utils.php');

	// Criando um usuário
	Utils::criarUsuario('espectador@teste.com','teste',3);
	Utils::criarUsuario('usuario@teste.com','teste',2);
	Utils::criarUsuario('administrador@teste.com','teste',1);
	
?>