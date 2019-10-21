<?php
class Secretaria
{
    /**Declaração de propriedade */
	private $id_usuario;
     private $cor_agenda
     private $ativo;

	/**Geters and Seters */

    /**
     * Set the value of id
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
     * Set the value of nome
     *
     * @return  self
     */
	public function setCor_Agenda($cor_agenda){
		$this->cor_agenda = $cor_agenda;
	}
	
	/**
     * Get the value of nome
     */ 
	public function getCor_Agenda(){
		return $this->cor_agenda;
	}

    /**
     * Set the value of cpf
     *
     * @return  self
     */
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	/**
     * Get the value of cpf
     */ 
	public function getAtivo(){
		return $this->ativo;
    }
}