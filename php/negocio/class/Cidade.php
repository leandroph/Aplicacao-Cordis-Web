<?php
class Cidade
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
	private $id_estado;
	
	/**Geters and Seters */
 
	/**
	 * setId
	 *
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function setId($id){
		$this->id = $id;
	}

	/**
	 * getId
	 *
	 * @return void
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * setNome
	 *
	 * @param  mixed $nome
	 *
	 * @return void
	 */
	public function setNome($nome){
		$this->nome = $nome;
	}
 
	/**
	 * getNome
	 *
	 * @return void
	 */
	public function getNome(){
		return $this->nome;
	}

	/**
	 * setId_Estado
	 *
	 * @param  mixed $id_estado
	 *
	 * @return void
	 */
	public function setId_Estado($id_estado){
		$this->id_estado = $id_estado;
	}
	
	/**
	 * getId_Estado
	 *
	 * @return void
	 */
	public function getId_Estado(){
		return $this->id_estado;
	}

}