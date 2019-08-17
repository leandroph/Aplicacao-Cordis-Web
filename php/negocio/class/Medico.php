<?php
class Medico
{
    // declaração de propriedade
	private $id;
	private $nome;
    private $cpf;
    private $rg;
    private $sexo;
    private $nascimento;
    private $corAgenda;
    private $crm;
    private $especialidade;
    private $ativo

	
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

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	
	public function getCpf(){
		return $this->cpf;
    }

    public function setRg($rg){
		$this->rg = $rg;
	}
	
	public function getRg(){
		return $this->rg;
    }

    public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	
	public function getSexo(){
		return $this->sexo;
    }

    public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}
	
	public function getNascimento(){
		return $this->nascimento;
    }

    public function setCorAgenda($corAgenda){
		$this->corAgenda = $corAgenda;
	}
	
	public function getCorAgenda(){
		return $this->corAgenda;
    }

    public function setCrm($crm){
		$this->crm = $crm;
	}
	
	public function getCrm(){
		return $this->crm;
    }

    public function setEspecialidade($especialidade){
		$this->especialidade = $especialidade;
	}
	
	public function getEspecialidade(){
		return $this->especialidade;
    }
    
    public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	public function getAtivo(){
		return $this->ativo;
	}

}