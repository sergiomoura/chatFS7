<?php

class Espectador {

	protected $id;
	protected $email;
	protected $logado;

	public function __construct(){
		$this->logado = false;
		$this->nivel = 3;
	}

	public function logar($email,$senha){
		$this->logado = true;
		return true;
	}

	
}