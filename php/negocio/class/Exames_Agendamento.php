<?php
class Exames_Agendamento
{
    /**Declaração de propriedade */
	private $id;
    private $id_exame;
	
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
	 * setId_Exame
	 *
	 * @param  mixed $id_exame
	 *
	 * @return void
	 */
	public function setId_Exame($id_exame){
		$this->id_exame = $id_exame;
	}

	/**
	 * getId_Exame
	 *
	 * @return void
	 */
	public function getId_Exame(){
		return $this->id_exame;
	}
}
