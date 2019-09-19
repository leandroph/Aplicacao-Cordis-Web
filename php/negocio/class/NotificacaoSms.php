<?php
class Notificacao
{
    /**Declaração de propriedade */
	private $apiKey;
	
	/**Geters and Seters */

    /**
     * Set the value of ApiKey
     *
     * @return  self
     */
	public function setApiKey($apiKey){
		$this->apiKey = $apiKey;
	}
	
	/**
     * Get the value of ApiKey
     */ 
	public function getApiKey(){
		return $this->apiKey;
	}

	

}
