<?php
class Medico
{
    /**Declaração de propriedade */
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

	/**Geters and Seters */

    
    /**
     * Set the value of ID
     *
     * @return  self
     */ 
	public function setId($id){
		$this->id = $id;
	}
	
	 /**
     * Get the value of ID
     */ 
	public function getId(){
		return $this->id;
	}
    
    /**
     * Set the value of Name
     *
     * @return  self
     */ 
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	 /**
     * Get the value of Name
     */ 
	public function getNome(){
		return $this->nome;
	}
    
    /**
     * Set the value of CPF
     *
     * @return  self
     */ 
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	
	 /**
     * Get the value of CPF
     */ 
	public function getCpf(){
		return $this->cpf;
    }
    
    /**
     * Set the value of RG
     *
     * @return  self
     */ 
    public function setRg($rg){
		$this->rg = $rg;
	}
	
	 /**
     * Get the value of RG
     */ 
	public function getRg(){
		return $this->rg;
    }
    
    /**
     * Set the value of Sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	
	 /**
     * Get the value of Sexo
     */ 
	public function getSexo(){
		return $this->sexo;
    }
    
    /**
     * Set the value of Nascimento
     *
     * @return  self
     */ 
    public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	 /**
     * Get the value of Nascimento
     */ 
	public function getNascimento(){
		return $this->nascimento;
    }

    /**
     * Set the value of Cor Agenda
     *
     * @return  self
     */ 
    public function setCorAgenda($corAgenda){
		$this->corAgenda = $corAgenda;
	}
	
	 /**
     * Get the value of  Cor Agenda
     */ 
	public function getCorAgenda(){
		return $this->corAgenda;
    }
    
    /**
     * Set the value of CRM
     *
     * @return  self
     */ 
    public function setCrm($crm){
		$this->crm = $crm;
	}
	
	 /**
     * Get the value of CRM
     */ 
	public function getCrm(){
		return $this->crm;
    }
    
    /**
     * Set the value of Especialidade
     *
     * @return  self
     */ 
    public function setEspecialidade($especialidade){
		$this->especialidade = $especialidade;
	}
	
	 /**
     * Get the value of Especialidade
     */ 
	public function getEspecialidade(){
		return $this->especialidade;
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