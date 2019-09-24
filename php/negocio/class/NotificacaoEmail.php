<?php
class Notificacao
{
    /**Declaração de propriedade */
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
     * Get the value of emailRemetente
     */ 
	public function getEmailRemetente(){
		return $this->emailRemetente;
	}

    /**
     * Set the value of emailRemetente
     *
     * @return  self
     */
	public function setEmailRemetente($emailRemetente){
		$this->emailRemetente = $emailRemetente;
		return $this;
    }
    

    /**
     * Get the value of servidor
     */ 
    public function getServidor(){
        return $this->servidor;
    }

    /**
     * Set the value of servidor
     *
     * @return  self
     */ 
    public function setServidor($servidor){
        $this->servidor = $servidor;
        return $this;
    }

    /**
     * Get the value of porta
     */ 
    public function getPorta(){
        return $this->porta;
    }

    /**
     * Set the value of porta
     *
     * @return  self
     */ 
    public function setPorta($porta){
        $this->porta = $porta;
        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario(){
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario){
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha(){
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }

    /**
     * Get the value of criptografia
     */ 
    public function getCriptografia(){
        return $this->criptografia;
    }

    /**
     * Set the value of criptografia
     *
     * @return  self
     */ 
    public function setCriptografia($criptografia){
        $this->criptografia = $criptografia;
        return $this;
    }

    /**
     * Get the value of emailOculto
     */ 
    public function getEmailOculto(){
        return $this->emailOculto;
    }

    /**
     * Set the value of emailOculto
     *
     * @return  self
     */ 
    public function setEmailOculto($emailOculto){
        $this->emailOculto = $emailOculto;
        return $this;
    }

    /**
     * Get the value of emailCopia
     */ 
    public function getEmailCopia(){
        return $this->emailCopia;
    }

    /**
     * Set the value of emailCopia
     *
     * @return  self
     */ 
    public function setEmailCopia($emailCopia){
        $this->emailCopia = $emailCopia;
        return $this;
    }
}
