<?php
class Usuario
{
    // declaração de propriedade
	private $id;
	private $login;
    private $senha;
    private $ativo;
	
	// Geters and Seters
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}

	public function setLogin($login){
		$this->login = $login;
	}
	
	public function getLogin(){
		return $this->login;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}
	
	public function getSenha(){
		return $this->senha;
    }
    
    public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	public function getAtivo(){
		return $this->ativo;
	}


}