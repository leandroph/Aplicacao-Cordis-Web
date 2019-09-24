<?php
class Secretaria
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
    private $cpf;
    private $rg;
    private $sexo;
    private $nascimento;
    private $corAgenda;
    private $ativo

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
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	
	/**
     * Get the value of cpf
     */ 
	public function getCpf(){
		return $this->cpf;
    }

    /**
     * Set the value of RG
     *
     * @return  self
     */
    public function setRg($rg){
		$this->rg = $rg;
	}
	
	/**
     * Get the value of RG
     */ 
	public function getRg(){
		return $this->rg;
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

    /**
     * Set the value of cor agenda
     *
     * @return  self
     */
    public function setCorAgenda($corAgenda){
		$this->corAgenda = $corAgenda;
	}
	
	/**
     * Get the value of cor agenda
     */ 
	public function getCorAgenda(){
		return $this->corAgenda;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */
    public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	/**
     * Get the value of ativo
     */ 
	public function getAtivo(){
		return $this->ativo;
	}

}