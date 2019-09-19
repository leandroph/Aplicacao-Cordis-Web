<?php
class Convenio
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
    private $ativo;
    private $nomeEmpresa;
    private $cnpjEmpresa;
	
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

    /**
     * Set the value of nome empresa
     *
     * @return  self
     */
    public function setNomeEmpresa($nomeEmpresa){
		$this->nomeEmpresa = $nomeEmpresa;
	}
	
	/**
     * Get the value of nome empresa
     */ 
	public function getNomeEmpresa(){
		return $this->nomeEmpresa;
    }

    /**
     * Set the value of Cnpj empresa
     *
     * @return  self
     */
    public function setCnpjEmpresa($cnpjEmpresa){
		$this->cnpjEmpresa = $cnpjEmpresa;
	}
	
	/**
     * Get the value of Cnpj empresa
     */ 
	public function getCnpjEmpresa(){
		return $this->cnpjEmpresa;
	}

}