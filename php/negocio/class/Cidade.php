<?php
class Cidade
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
	private $id_estado
	
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
     * Get the value of nome
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

	public function setId_Estado($id_estado){
		$this->id_estado = $id_estado;
	}
	
	/**
     * Get the value of nome
     */ 
	public function getId_Estado(){
		return $this->id_estado;
	}

}