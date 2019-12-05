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

}