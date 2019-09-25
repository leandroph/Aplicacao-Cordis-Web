<?php
class Exame
{
    /**Declaração de propriedade */
	private $id;
    private $nome;
    private $valor;
    private $especial;
	private $ativo;
	
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
     * Set the value of Nome
     *
     * @return  self
     */ 
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	 /**
     * Get the value of Nome
     */ 
	public function getNome(){
		return $this->nome;
	}

    /**
     * Set the value of Valor
     *
     * @return  self
     */ 
    public function setValor($valor){
		$this->valor = $valor;
	}
	
	 /**
     * Get the value of Valor
     */ 
	public function getValor(){
		return $this->valor;
	}

    /**
     * Set the value of Especial
     *
     * @return  self
     */ 
    public function setEspecial($especial){
		$this->especial = $especial;
	}
	
	/**
     * Get the value of Especial
     */ 
	public function getEspecial(){
		return $this->especial;
	}

    /**
     * Set the value of Ativo
     *
     * @return  self
     */ 
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	 /**
     * Get the value of Ativo
     */ 
	public function getAtivo(){
		return $this->ativo;
    }
}
