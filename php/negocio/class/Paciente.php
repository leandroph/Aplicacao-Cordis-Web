<?php
class Paciente
{
    // declaração de propriedade
	private $id;
	private $nome;
    private $cpf;
    private $sexo;
    private $nascimento;
	
	// Geters and Seters
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getNome(){
		return $this->nome;
	}

	public function setCPF($cpf){
		$this->cpf = $cpf;
	}
	
	public function getCPF(){
		return $this->cpf;
    }
    
    public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	
	public function getSexo(){
		return $this->sexo;
    }
    
    public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}
	
	public function getNascimento(){
		return $this->nascimento;
	}


}