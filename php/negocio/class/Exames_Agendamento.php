<?php
class Exames_Agendamento
{
    /**Declaração de propriedade */
	private $id;
    private $id_exame;
	
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
	public function setId_Exame($id_exame){
		$this->id_exame = $id_exame;
	}
	
	 /**
     * Get the value of Nome
     */ 
	public function getId_Exame(){
		return $this->id_exame;
	}
}
