<?php
class AgendaProntuario
{
    /**Declaração de propriedade */
    private $id;
    private $idProntuario;
    private $idAgendamento;
	
	/**Geters and Seters */

    /**
     * getId
     *
     * @return void
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * setId
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
 
    /**
     * getIdProntuario
     *
     * @return void
     */
    public function getIdProntuario()
    {
        return $this->idProntuario;
    }

    /**
     * setIdProntuario
     *
     * @param  mixed $idProntuario
     *
     * @return void
     */
    public function setIdProntuario($idProntuario)
    {
        $this->idProntuario = $idProntuario;

        return $this;
    }

    /**
     * getIdAgendamento
     *
     * @return void
     */
    public function getIdAgendamento()
    {
        return $this->idAgendamento;
    }

    /**
     * setIdAgendamento
     *
     * @param  mixed $idAgendamento
     *
     * @return void
     */
    public function setIdAgendamento($idAgendamento)
    {
        $this->idAgendamento = $idAgendamento;

        return $this;
    }
}