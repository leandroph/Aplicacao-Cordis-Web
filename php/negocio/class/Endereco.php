<?php
class Endereco
{
    /**Declaração de propriedade */
	private $id;
	private $logradouro;
    private $bairro;
    private $numero;
    private $cep;
	private $complemento;
	private $id_cidade;
	
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
     * Set the value of Logradouro
     *
     * @return  self
     */ 
	public function setLogradouro($logradouro){
		$this->logradouro = $logradouro;
	}
	
	/**
	 * Get the value of Logradouro
	 */ 
	public function getLogradouro(){
		return $this->logradouro;
	}

    /**
     * Set the value of Bairro
     *
     * @return  self
     */ 
	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	
	/**
	 * Get the value of Bairro
	 */ 
	public function getBairro(){
		return $this->bairro;
    }
    
    /**
     * Set the value of Número
     *
     * @return  self
     */ 
    public function setNumero($numero){
		$this->numero = $numero;
	}
	
	/**
	 * Get the value of Número
	 */ 
	public function getNumero(){
		return $this->numero;
	}
    
    /**
     * Set the value of CEP
     *
     * @return  self
     */ 
    public function setCep($cep){
		$this->cep = $cep;
	}
	
	/**
	 * Get the value of CEP
	 */ 
	public function getCep(){
		return $this->cep;
    }
    /**
     * Set the value of Complemento
     *
     * @return  self
     */ 
    public function setComplemento($complemento){
		$this->complemento = $complemento;
	}
	
	/**
	 * Get the value of Complemento
	 */ 
	public function getComplemento(){
		return $this->complemento;
	}


	/**
	 * Get the value of id_cidade
	 */ 
	public function getId_cidade()
	{
		return $this->id_cidade;
	}

	/**
	 * Set the value of id_cidade
	 *
	 * @return  self
	 */ 
	public function setId_cidade($id_cidade)
	{
		$this->id_cidade = $id_cidade;

		return $this;
	}
}