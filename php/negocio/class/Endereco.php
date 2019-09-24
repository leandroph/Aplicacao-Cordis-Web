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
	
	/**Geters and Seters */
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}

	public function setLogradouro($logradouro){
		$this->logradouro = $logradouro;
	}
	
	public function getLogradouro(){
		return $this->logradouro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	
	public function getBairro(){
		return $this->bairro;
    }
    
    public function setNumero($numero){
		$this->numero = $numero;
	}
	
	public function getNumero(){
		return $this->numero;
	}

    public function setCep($cep){
		$this->cep = $cep;
	}
	
	public function getCep(){
		return $this->cep;
    }
    
    public function setComplemento($complemento){
		$this->complemento = $complemento;
	}
	
	public function getComplemento(){
		return $this->complemento;
	}

}