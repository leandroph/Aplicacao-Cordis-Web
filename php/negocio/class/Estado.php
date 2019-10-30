<?php
class Estado
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
	private $uf;
	private $id_pais;

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
	 * setUf
	 *
	 * @param  mixed $uf
	 *
	 * @return void
	 */
	public function setUf($uf){
		$this->uf = $uf;
	}

	/**
	 * getUf
	 *
	 * @return void
	 */
	public function getUf(){
		return $this->uf;
	}

	/**
	 * setId_Pais
	 *
	 * @param  mixed $id_pais
	 *
	 * @return void
	 */
	public function setId_Pais($id_pais){
		$this->id_pais = $id_pais;
	}
	
	/**
	 * getId_Pais
	 *
	 * @return void
	 */
	public function getId_Pais(){
		return $this->id_pais;
	}


}