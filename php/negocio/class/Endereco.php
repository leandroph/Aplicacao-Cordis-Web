<?php
class Endereco
{
    /**Declaração de propriedade */
	private $id;
	private $logradouro;
    private $bairro;
    private $numero;
    private $cep;
	private $complemento;
	private $id_cidade;
	
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
	 * setLogradouro
	 *
	 * @param  mixed $logradouro
	 *
	 * @return void
	 */
	public function setLogradouro($logradouro){
		$this->logradouro = $logradouro;
	}

	/**
	 * getLogradouro
	 *
	 * @return void
	 */
	public function getLogradouro(){
		return $this->logradouro;
	}
 
	/**
	 * setBairro
	 *
	 * @param  mixed $bairro
	 *
	 * @return void
	 */
	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	/**
	 * getBairro
	 *
	 * @return void
	 */
	public function getBairro(){
		return $this->bairro;
    }

    /**
     * setNumero
     *
     * @param  mixed $numero
     *
     * @return void
     */
    public function setNumero($numero){
		$this->numero = $numero;
	}
 
	/**
	 * getNumero
	 *
	 * @return void
	 */
	public function getNumero(){
		return $this->numero;
	}

    /**
     * setCep
     *
     * @param  mixed $cep
     *
     * @return void
     */
    public function setCep($cep){
		$this->cep = $cep;
	}

	/**
	 * getCep
	 *
	 * @return void
	 */
	public function getCep(){
		return $this->cep;
    }

    /**
     * setComplemento
     *
     * @param  mixed $complemento
     *
     * @return void
     */
    public function setComplemento($complemento){
		$this->complemento = $complemento;
	}

	/**
	 * getComplemento
	 *
	 * @return void
	 */
	public function getComplemento(){
		return $this->complemento;
	}

	/**
	 * getId_cidade
	 *
	 * @return void
	 */
	public function getId_cidade()
	{
		return $this->id_cidade;
	}
 
	/**
	 * setId_cidade
	 *
	 * @param  mixed $id_cidade
	 *
	 * @return void
	 */
	public function setId_cidade($id_cidade)
	{
		$this->id_cidade = $id_cidade;

		return $this;
	}
}