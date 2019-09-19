<?php
class Paciente
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
    private $cpf;
    private $sexo;
    private $nascimento;
	
	/**Geters and Seters */

    /**
     * Set the value of id
     *
     * @return  self
     */
	public function setId($id){
		$this->id = $id;
	}
	
	/**
     * Get the value of id
     */ 
	public function getId(){
		return $this->id;
	}

    /**
     * Set the value of nome
     *
     * @return  self
     */
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	/**
     * Get the value of nome
     */ 
	public function getNome(){
		return $this->nome;
	}

    /**
     * Set the value of cpf
     *
     * @return  self
     */
	public function setCPF($cpf){
		$this->cpf = $cpf;
	}
	
	/**
     * Get the value of cpf
     */ 
	public function getCPF(){
		return $this->cpf;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */
    public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	
	/**
     * Get the value of sexo
     */ 
	public function getSexo(){
		return $this->sexo;
	}

    /**
     * Set the value of nascimento
     *
     * @return  self
     */
    public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}
	
	/**
     * Get the value of nascimento
     */ 
	public function getNascimento(){
		return $this->nascimento;
	}

}