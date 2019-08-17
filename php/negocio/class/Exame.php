<?php
class Exame
{
    // declaração de propriedade
	private $id;
    private $nome;
    private $valor;
    private $especial;
    private $ativo;
    
	
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

    public function setValor($valor){
		$this->valor = $valor;
	}
	
	public function getValor(){
		return $this->valor;
    }
    
    public function setEspecial($especial){
		$this->especial = $especial;
	
	public function getEspecial(){
		return $this->especial;
	}

	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	public function getAtivo(){
		return $this->ativo;
    }
    


}
