<?php
class Notificacao
{
    // declaração de propriedade
	private $id;
    private $nome;
    private $ativo;
    private $textoTrocaStatus;
    private $textoConfirmacao;
    private $nomeRemetente;
	
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

    public function setTextoTrocaStatus($textoTrocaStatus){
		$this->textoTrocaStatus = $textoTrocaStatus;
	}
	
	public function getTextoTrocaStatus(){
		return $this->textoTrocaStatus;
    }
    
    public function setTextoConfirmacao($textoConfirmacao){
		$this->textoConfirmacao = $textoConfirmacao;
	
	public function getTextoConfirmacao(){
		return $this->textoConfirmacao;
	}
    
    public function setNomeRemetente($nomeRemetente){
		$this->nomeRemetente = $nomeRemetente;
	
	public function getNomeRemetente(){
		return $this->nomeRemetente;
	}

}
