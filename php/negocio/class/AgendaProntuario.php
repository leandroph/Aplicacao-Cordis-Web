<?php
class AgendaProntuario
{
    /**Declaração de propriedade */
    private $id;
    private $idProntuario;
    private $idAgendamento;
	
	/**Geters and Seters */

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idProntuario
     */ 
    public function getIdProntuario()
    {
        return $this->idProntuario;
    }

    /**
     * Set the value of idProntuario
     *
     * @return  self
     */ 
    public function setIdProntuario($idProntuario)
    {
        $this->idProntuario = $idProntuario;

        return $this;
    }

    /**
     * Get the value of idAgendamento
     */ 
    public function getIdAgendamento()
    {
        return $this->idAgendamento;
    }

    /**
     * Set the value of idAgendamento
     *
     * @return  self
     */ 
    public function setIdAgendamento($idAgendamento)
    {
        $this->idAgendamento = $idAgendamento;

        return $this;
    }
}