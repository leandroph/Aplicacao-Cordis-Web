<?php
class Notificacao
{
    /**Declaração de propriedade */
    private $idNotificacao;
	private $emailRemetente;
    private $servidor;
    private $porta;
    private $usuario;
    private $senha;
    private $criptografia;
    private $emailOculto;
    private $emailCopia;
	
	/**Geters and Seters */

    /**
	 * getIdNotificacao
	 *
	 * @return void
	 */
	public function getIdNotificacao(){
		return $this->idNotificacao;
	}

	/**
	 * setIdNotificacao
	 *
	 * @param  mixed $idNotificacao
	 *
	 * @return void
	 */
	public function setIdNotificacao($idNotificacao){
		$this->idNotificacao = $idNotificacao;
		return $this;
    }

	/**
	 * getEmailRemetente
	 *
	 * @return void
	 */
	public function getEmailRemetente(){
		return $this->emailRemetente;
	}

	/**
	 * setEmailRemetente
	 *
	 * @param  mixed $emailRemetente
	 *
	 * @return void
	 */
	public function setEmailRemetente($emailRemetente){
		$this->emailRemetente = $emailRemetente;
		return $this;
    }
    
    /**
     * getServidor
     *
     * @return void
     */
    public function getServidor(){
        return $this->servidor;
    }

    /**
     * setServidor
     *
     * @param  mixed $servidor
     *
     * @return void
     */
    public function setServidor($servidor){
        $this->servidor = $servidor;
        return $this;
    }

    /**
     * getPorta
     *
     * @return void
     */
    public function getPorta(){
        return $this->porta;
    }

    /**
     * setPorta
     *
     * @param  mixed $porta
     *
     * @return void
     */
    public function setPorta($porta){
        $this->porta = $porta;
        return $this;
    }
 
    /**
     * getUsuario
     *
     * @return void
     */
    public function getUsuario(){
        return $this->usuario;
    }

    /**
     * setUsuario
     *
     * @param  mixed $usuario
     *
     * @return void
     */
    public function setUsuario($usuario){
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * getSenha
     *
     * @return void
     */
    public function getSenha(){
        return $this->senha;
    }

    /**
     * setSenha
     *
     * @param  mixed $senha
     *
     * @return void
     */
    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }

    /**
     * getCriptografia
     *
     * @return void
     */
    public function getCriptografia(){
        return $this->criptografia;
    }

    /**
     * setCriptografia
     *
     * @param  mixed $criptografia
     *
     * @return void
     */
    public function setCriptografia($criptografia){
        $this->criptografia = $criptografia;
        return $this;
    }

    /**
     * getEmailOculto
     *
     * @return void
     */
    public function getEmailOculto(){
        return $this->emailOculto;
    }

    /**
     * setEmailOculto
     *
     * @param  mixed $emailOculto
     *
     * @return void
     */
    public function setEmailOculto($emailOculto){
        $this->emailOculto = $emailOculto;
        return $this;
    }

    /**
     * getEmailCopia
     *
     * @return void
     */
    public function getEmailCopia(){
        return $this->emailCopia;
    }

    /**
     * setEmailCopia
     *
     * @param  mixed $emailCopia
     *
     * @return void
     */
    public function setEmailCopia($emailCopia){
        $this->emailCopia = $emailCopia;
        return $this;
    }
}
