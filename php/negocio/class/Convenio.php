<?php
class Convenio
{
    // declaração de propriedade
	private $id;
	private $nome;
    private $ativo;
    private $nomeEmpresa;
    private $cnpjEmpresa;
	
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

	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	public function getAtivo(){
		return $this->ativo;
    }
    
    public function setNomeEmpresa($nomeEmpresa){
		$this->nomeEmpresa = $nomeEmpresa;
	}
	
	public function getNomeEmpresa(){
		return $this->nomeEmpresa;
    }
    
    public function setCnpjEmpresa($cnpjEmpresa){
		$this->cnpjEmpresa = $cnpjEmpresa;
	}
	
	public function getCnpjEmpresa(){
		return $this->cnpjEmpresa;
	}


}