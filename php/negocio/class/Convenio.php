<?php
class Convenio
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
    private $ativo;
    private $nomeEmpresa;
    private $cnpjEmpresa;
	
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

    /**
     * setNomeEmpresa
     *
     * @param  mixed $nomeEmpresa
     *
     * @return void
     */
    public function setNomeEmpresa($nomeEmpresa){
		$this->nomeEmpresa = $nomeEmpresa;
	}

	/**
	 * getNomeEmpresa
	 *
	 * @return void
	 */
	public function getNomeEmpresa(){
		return $this->nomeEmpresa;
    }

    /**
     * setCnpjEmpresa
     *
     * @param  mixed $cnpjEmpresa
     *
     * @return void
     */
    public function setCnpjEmpresa($cnpjEmpresa){
		$this->cnpjEmpresa = $cnpjEmpresa;
	}

	/**
	 * getCnpjEmpresa
	 *
	 * @return void
	 */
	public function getCnpjEmpresa(){
		return $this->cnpjEmpresa;
	}

}