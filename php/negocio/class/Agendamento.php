<?php
class Agendamento
{
    /**Declaração de propriedade */
    private $id;
    private $dataHoraInicio;
    private $dataHoraFim;
    private $valor;
    private $observacao;
    private $status;
    private $pago;
	
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
     * Get the value of dataHoraInicio
     */ 
    public function getDataHoraInicio()
    {
        return $this->dataHoraInicio;
    }

    /**
     * Set the value of dataHoraInicio
     *
     * @return  self
     */ 
    public function setDataHoraInicio($dataHoraInicio)
    {
        $this->dataHoraInicio = $dataHoraInicio;

        return $this;
    }

    /**
     * Get the value of dataHoraFim
     */ 
    public function getDataHoraFim()
    {
        return $this->dataHoraFim;
    }

    /**
     * Set the value of dataHoraFim
     *
     * @return  self
     */ 
    public function setDataHoraFim($dataHoraFim)
    {
        $this->dataHoraFim = $dataHoraFim;

        return $this;
    }

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of observacao
     */ 
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set the value of observacao
     *
     * @return  self
     */ 
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of pago
     */ 
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set the value of pago
     *
     * @return  self
     */ 
    public function setPago($pago)
    {
        $this->pago = $pago;

        return $this;
    }
}