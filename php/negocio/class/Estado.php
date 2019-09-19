<?php
class Estado
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
	private $uf;

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
     * Set the value of uf
     *
     * @return  self
     */
	public function setUf($uf){
		$this->uf = $uf;
	}
	
	/**
     * Get the value of uf
     */ 
	public function getUf(){
		return $this->uf;
	}

}