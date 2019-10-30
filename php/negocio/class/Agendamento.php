<?php
class Agendamento
{
    /**Declaração de propriedade */
    private id,
	private data_hora_inicio,
	private data_hora_fim,
	private valor,
	private observacao,
	private senha,
	private cod_status,
	private pago,
	private id_not_email,
	private id_not_sms,
	private id_convenio,
	private id_exames_agendamento,
	private id_secretaria,
	private id_paciente,
	private id_medico,
	
    
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

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getCod_Status()
    {
        return $this->cod_status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setCod_Status($cod_status)
    {
        $this->cod_status = $cod_status;

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

    public function getIdNotEmail()
    {
        return $this->id_not_email;
    }

    public function setIdNotEmail($id_not_email)
    {
        $this->id_not_email = $id_not_email;

        return $this;
    }

    public function getIdNotSms()
    {
        return $this->id_not_sms;
    }

    public function setIdNotSms($id_not_sms)
    {
        $this->id_not_sms = $id_not_sms;
        
        return $this;
    }

    public function getId_Convenio()
    {
        return $this->id_convenio;
    }

    public function setId_Convenio($id_convenio)
    {
        $this->id_convenio = $id_convenio;
        
        return $this;
    }

    public function getId_Exames_Agendamento()
    {
        return $this->id_exames_agendamento;
    }

    public function setId_Exames_Agendamento($id_exames_agendamento)
    {
        $this->id_exames_agendamento = $id_exames_agendamento;
        
        return $this;
    }

    public function getId_Secretaria()
    {
        return $this->id_secretaria;
    }

    public function setId_Secretaria($id_secretaria)
    {
        $this->id_secretaria = $id_secretaria;

        return $this;
    }

    public function getId_Paciente()
    {
        return $this->id_paciente;
    }

    public function setId_Paciente($id_paciente)
    {
        $this->id_paciente = $id_paciente;

        return $this;
    }

    public function getId_Medico() 
    {
        return $this->id_medico;
    }

    public function setId_Medico($id_medico)
    {
        $this->id_medico = $id_medico;

        return $id_medico;
    }
}