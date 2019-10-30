<?php
class Secretaria
{
    /**Declaração de propriedade */
	private $id_usuario;
     private $cor_agenda;
     private $ativo;

     /**Geters and Seters */
     
	/**
	 * setId_Usuario
	 *
	 * @param  mixed $id_usuario
	 *
	 * @return void
	 */
	public function setId_Usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	/**
	 * getId_Usuario
	 *
	 * @return void
	 */
	public function getId_Usuario(){
		return $this->id_usuario;
	}

	/**
	 * setCor_Agenda
	 *
	 * @param  mixed $cor_agenda
	 *
	 * @return void
	 */
	public function setCor_Agenda($cor_agenda){
		$this->cor_agenda = $cor_agenda;
	}

	/**
	 * getCor_Agenda
	 *
	 * @return void
	 */
	public function getCor_Agenda(){
		return $this->cor_agenda;
	}

	/**
	 * setAtivo
	 *
	 * @param  mixed $ativo
	 *
	 * @return void
	 */
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	/**
	 * getAtivo
	 *
	 * @return void
	 */
	public function getAtivo(){
		return $this->ativo;
    }
}