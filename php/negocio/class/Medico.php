<?php
class Medico
{
    /**Declaração de propriedade */
	  private $id_usuario;
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
    public function setId_Usuario($id_usuario){
      $this->id_usuario = $id_usuario;
    }
 
 /**
 * Get the value of id
 */ 
    public function getId_Usuario(){
      return $this->id_usuario;
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