<?php

class Espectador {

	protected $id;
	protected $email;
	protected $senha;
	protected $bloqueado;
	protected $logado;

	public function __construct($id,$email,$senha,$bloqueado){
		$this->id = $id;
		$this->email = $email;
		$this->senha = $senha;
		$this->bloqueado = $bloqueado;
		$this->logado = false;
	}

	public function logar($email,$senha){
		if($this->email == $email && password_verify($senha,$this->senha)){
			$this->logado = true;
			return true;
		} else {
			return false;
		}
	}

	public function getMensagens(){
		$db = new DB();
		$query = $db->prepare("SELECT
															m.id,
															hora,
															texto,
															email
														FROM
															mensagens m
															INNER JOIN usuarios u ON m.id_usuario=u.id;");
		$query->execute();
		$mensagens = $query->fetchAll(PDO::FETCH_ASSOC);
		return $mensagens;
	}

	public function getEmail(){
		return $this->email;
	}

}