<?php
class Preferencia
{
    private $id_usuario;
    private $pref_skin;
    private $filtro_paciente;
    private $filtro_medico;
    private $filtro_secretaria;
    private $filtro_administrador;
    
    
    /**
     * setId_Usuario
     *
     * @param  mixed $id_usuario
     *
     * @return void
     */
    public function setId_Usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * getId_Usuario
     *
     * @return void
     */
    public function getId_Usuario() 
    {
        return $this->id_usuario;
    }

    /**
     * setPref_Skin
     *
     * @param  mixed $pref_skin
     *
     * @return void
     */
    public function setPref_Skin($pref_skin)
    {
        $this->pref_skin = $pref_skin;
    }

    /**
     * getPref_Skin
     *
     * @return void
     */
    public function getPref_Skin()
    {
        return $this->pref_skin;
    }

    /**
     * setFiltro_Paciente
     *
     * @param  mixed $filtro_paciente
     *
     * @return void
     */
    public function setFiltro_Paciente($filtro_paciente)
    {
        $this->filtro_paciente = $filtro_paciente;
    }

    /**
     * getFiltro_Paciente
     *
     * @return void
     */
    public function getFiltro_Paciente()
    {
        return $this->filtro_paciente;
    }

    /**
     * setFiltro_Medico
     *
     * @param  mixed $filtro_medico
     *
     * @return void
     */
    public function setFiltro_Medico($filtro_medico)
    {
        $this->filtro_medico = $filtro_medico;
    }

    /**
     * getFiltro_Medico
     *
     * @return void
     */
    public function getFiltro_Medico()
    {
         return $this->filtro_medico;
    }

    /**
     * setFiltro_Secretaria
     *
     * @param  mixed $filtro_secretaria
     *
     * @return void
     */
    public function setFiltro_Secretaria($filtro_secretaria)
    {
        $this->filtro_secretaria = $filtro_secretaria;
    }

    /**
     * getFiltro_Secretaria
     *
     * @return void
     */
    public function getFiltro_Secretaria()
    {
        return $this->filtro_secretaria;
    }

    /**
     * setFiltro_Administrador
     *
     * @param  mixed $filtro_administrador
     *
     * @return void
     */
    public function setFiltro_Administrador($filtro_administrador)
    {
        $this->filtro_administrador = $filtro_administrador;
    }

    /**
     * getFiltro_Administrador
     *
     * @return void
     */
    public function getFiltro_Administrador()
    {
        return $this->filtro_administrador;
    }
}
