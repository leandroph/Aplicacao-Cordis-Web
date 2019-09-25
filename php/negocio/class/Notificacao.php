<?php
class Notificacao
{
    /**Declaração de propriedade */
	private $id;
    private $nome;
    private $ativo;
    private $textoTrocaStatus;
    private $textoConfirmacao;
    private $nomeRemetente;
	
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
     * Set the value of Nome
     *
     * @return  self
     */ 
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	 /**
     * Get the value of Nome
     */ 
	public function getNome(){
		return $this->nome;
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
    
    /**
     * Set the value of Texto Troca Status
     *
     * @return  self
     */
    public function setTextoTrocaStatus($textoTrocaStatus){
		$this->textoTrocaStatus = $textoTrocaStatus;
	}
	
	 /**
     * Get the value of Texto Troca Status
     */ 
	public function getTextoTrocaStatus(){
		return $this->textoTrocaStatus;
    }
    
    /**
     * Set the value of Texto Confirmação
     *
     * @return  self
     */ 
    public function setTextoConfirmacao($textoConfirmacao){
		$this->textoConfirmacao = $textoConfirmacao;
	}
	
	/**
     * Get the value of Texto Confirmação
     */ 
	public function getTextoConfirmacao(){
		return $this->textoConfirmacao;
	}
    
    /**
     * Set the value of Nome Remetente
     *
     * @return  self
     */ 
    public function setNomeRemetente($nomeRemetente){
		$this->nomeRemetente = $nomeRemetente;
	}

	 /**
     * Get the value of Nome Remetente
     */ 
	public function getNomeRemetente(){
		return $this->nomeRemetente;
	}

}
