<?php
class Administrador
{
    
	private $id_usuario;

	/**
	 * getId_usuario
	 *
	 * @return void
	 */
	public function getId_usuario()
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
	public function setId_usuario($id_usuario)
	{
		$this->id_usuario = $id_usuario;

		return $this;
	}
}