<?php
class Pais
{
	/**Declaração de propriedade */
	private $id;
	private $nome;
	private $sigla;

	/**Geters and Seters */

	/**
	 * setId
	 *
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * getId
	 *
	 * @return void
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * setNome
	 *
	 * @param  mixed $nome
	 *
	 * @return void
	 */
	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	/**
	 * getNome
	 *
	 * @return void
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * setSigla
	 *
	 * @param  mixed $sigla
	 *
	 * @return void
	 */
	public function setSigla($sigla)
	{
		$this->sigla = $sigla;
	}

	/**
	 * getSigla
	 *
	 * @return void
	 */
	public function getSigla()
	{
		return $this->sigla;
	}
}
