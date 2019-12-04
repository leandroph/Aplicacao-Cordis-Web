<?php
class Administrador
{
    /**Declaração de propriedade */
	private $id_usuario;

	/**
	 * getId_usuario
	 *
	 * @return void
	 */
	public function getId_Usuario()
	{
		return $this->id_usuario;
	}

	/**
	 * setId_usuario
	 *
	 * @param  mixed $id_usuario
	 *
	 * @return void
	 */
	public function setId_Usuario($id_usuario)
	{
		$this->id_usuario = $id_usuario;

		return $this;
	}
}