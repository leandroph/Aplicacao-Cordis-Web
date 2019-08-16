<?php
class Contato
{
    // declaração de propriedade
	private $id;
	private $email;
    private $telefone1;
    private $telefone2;
	
	// Geters and Seters
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}

	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getEmail(){
		return $this->email;
	}

	public function setTelefone1($telefone1){
		$this->telefone1 = $telefone1;
	}
	
	public function getTelefone1(){
		return $this->telefone1;
    }
    
    public function setTelefone2($telefone2){
		$this->telefone2 = $telefone2;
	}
	
	public function getTelefone2(){
		return $this->telefone2;
    }

}