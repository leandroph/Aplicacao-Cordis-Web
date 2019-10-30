<?php
class Exame
{
    /**Declaração de propriedade */
	private $id;
    private $nome;
    private $valor;
    private $especial;
	private $ativo;
	
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
     * setValor
     *
     * @param  mixed $valor
     *
     * @return void
     */
    public function setValor($valor){
		$this->valor = $valor;
	}

	/**
	 * getValor
	 *
	 * @return void
	 */
	public function getValor(){
		return $this->valor;
	}

    /**
     * setEspecial
     *
     * @param  mixed $especial
     *
     * @return void
     */
    public function setEspecial($especial){
		$this->especial = $especial;
	}

	/**
	 * getEspecial
	 *
	 * @return void
	 */
	public function getEspecial(){
		return $this->especial;
	}

	/**
	 * setAtivo
	 *
	 * @param  mixed $ativo
	 *
	 * @return void
	 */
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	/**
	 * getAtivo
	 *
	 * @return void
	 */
	public function getAtivo(){
		return $this->ativo;
    }
}
