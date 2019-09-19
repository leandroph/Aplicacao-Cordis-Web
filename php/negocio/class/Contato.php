<?php
class Contato
{
    /**Declaração de propriedade */
	private $id;
	private $email;
    private $telefone1;
    private $telefone2;
	
	/** Geters and Seters*/

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
     * Set the value of email
     *
     * @return  self
     */
	public function setEmail($email){
		$this->email = $email;
	}
    
    /**
     * Get the value of email
     */ 
	public function getEmail(){
		return $this->email;
	}

	/**
     * Set the value of phone1
     *
     * @return  self
     */
	public function setTelefone1($telefone1){
		$this->telefone1 = $telefone1;
	}

    /**
     * Get the value of phone1
     */ 
	public function getTelefone1(){
		return $this->telefone1;
    }
	
	/**
     * Set the value of phone2
     *
     * @return  self
     */
    public function setTelefone2($telefone2){
		$this->telefone2 = $telefone2;
	}
    
    /**
     * Get the value of phone2
     */ 
	public function getTelefone2(){
		return $this->telefone2;
    }

}