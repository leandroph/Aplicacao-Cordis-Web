<?php
class Agendamento
{
    /**Declaração de propriedade */
    private $id;
	private $data_hora_inicio;
	private $data_hora_fim;
	private $valor;
	private $observacao;
	private $senha;
	private $cod_status;
	private $pago;
	private $id_not_email;
	private $id_not_sms;
	private $id_convenio;
	private $id_exames_agendamento;
	private $id_secretaria;
	private $id_paciente;
	private $id_medico;
	
    
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
     * getDataHoraInicio
     *
     * @return void
     */
    public function getDataHoraInicio()
    {
        return $this->dataHoraInicio;
    }

     
    /**
     * setDataHoraInicio
     *
     * @param  mixed $dataHoraInicio
     *
     * @return void
     */
    public function setDataHoraInicio($dataHoraInicio)
    {
        $this->dataHoraInicio = $dataHoraInicio;

        return $this;
    }

    
    /**
     * getDataHoraFim
     *
     * @return void
     */
    public function getDataHoraFim()
    {
        return $this->dataHoraFim;
    }

    /**
     * setDataHoraFim
     *
     * @param  mixed $dataHoraFim
     *
     * @return void
     */
    public function setDataHoraFim($dataHoraFim)
    {
        $this->dataHoraFim = $dataHoraFim;

        return $this;
    }

    /**
     * getValor
     *
     * @return void
     */
    public function getValor()
    {
        return $this->valor;
    }
 
    /**
     * setValor
     *
     * @param  mixed $valor
     *
     * @return void
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * getObservacao
     *
     * @return void
     */
    public function getObservacao()
    {
        return $this->observacao;
    }
 
    /**
     * setObservacao
     *
     * @param  mixed $observacao
     *
     * @return void
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * getSenha
     *
     * @return void
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * setSenha
     *
     * @param  mixed $senha
     *
     * @return void
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * getCod_Status
     *
     * @return void
     */
    public function getCod_Status()
    {
        return $this->cod_status;
    }
 
    /**
     * setCod_Status
     *
     * @param  mixed $cod_status
     *
     * @return void
     */
    public function setCod_Status($cod_status)
    {
        $this->cod_status = $cod_status;

        return $this;
    }
 
    /**
     * getPago
     *
     * @return void
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * setPago
     *
     * @param  mixed $pago
     *
     * @return void
     */
    public function setPago($pago)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * getIdNotEmail
     *
     * @return void
     */
    public function getIdNotEmail()
    {
        return $this->id_not_email;
    }

    /**
     * setIdNotEmail
     *
     * @param  mixed $id_not_email
     *
     * @return void
     */
    public function setIdNotEmail($id_not_email)
    {
        $this->id_not_email = $id_not_email;

        return $this;
    }

    /**
     * getIdNotSms
     *
     * @return void
     */
    public function getIdNotSms()
    {
        return $this->id_not_sms;
    }

    /**
     * setIdNotSms
     *
     * @param  mixed $id_not_sms
     *
     * @return void
     */
    public function setIdNotSms($id_not_sms)
    {
        $this->id_not_sms = $id_not_sms;
        
        return $this;
    }

    /**
     * getId_Convenio
     *
     * @return void
     */
    public function getId_Convenio()
    {
        return $this->id_convenio;
    }

    /**
     * setId_Convenio
     *
     * @param  mixed $id_convenio
     *
     * @return void
     */
    public function setId_Convenio($id_convenio)
    {
        $this->id_convenio = $id_convenio;
        
        return $this;
    }

    /**
     * getId_Exames_Agendamento
     *
     * @return void
     */
    public function getId_Exames_Agendamento()
    {
        return $this->id_exames_agendamento;
    }

    /**
     * setId_Exames_Agendamento
     *
     * @param  mixed $id_exames_agendamento
     *
     * @return void
     */
    public function setId_Exames_Agendamento($id_exames_agendamento)
    {
        $this->id_exames_agendamento = $id_exames_agendamento;
        
        return $this;
    }

    /**
     * getId_Secretaria
     *
     * @return void
     */
    public function getId_Secretaria()
    {
        return $this->id_secretaria;
    }

    /**
     * setId_Secretaria
     *
     * @param  mixed $id_secretaria
     *
     * @return void
     */
    public function setId_Secretaria($id_secretaria)
    {
        $this->id_secretaria = $id_secretaria;

        return $this;
    }

    /**
     * getId_Paciente
     *
     * @return void
     */
    public function getId_Paciente()
    {
        return $this->id_paciente;
    }

    /**
     * setId_Paciente
     *
     * @param  mixed $id_paciente
     *
     * @return void
     */
    public function setId_Paciente($id_paciente)
    {
        $this->id_paciente = $id_paciente;

        return $this;
    }

    /**
     * getId_Medico
     *
     * @return void
     */
    public function getId_Medico() 
    {
        return $this->id_medico;
    }

    /**
     * setId_Medico
     *
     * @param  mixed $id_medico
     *
     * @return void
     */
    public function setId_Medico($id_medico)
    {
        $this->id_medico = $id_medico;

        return $id_medico;
    }
}