<?php
class Pais
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
	private $sigla;
	
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
     * Set the value of sigla
     *
     * @return  self
     */
	public function setSigla($sigla){
		$this->sigla = $sigla;
	}
	
	/**
     * Get the value of sigla
     */ 
	public function getSigla(){
		return $this->sigla;
	}

}
