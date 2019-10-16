<?php
class Preferencia
{
    private $id_usuario;
    private $pref_skin;
    private $filtro_paciente;
    private $filtro_medico;
    private $filtro_secretaria;
    private $filtor_administrador;

    @return self
    
    public function setId_Usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getId_Usuario() 
    {
        return $this->id_usuario;
    }

    public function setPref_Skin($pref_skin)
    {
        $this->pref_skin = $pref_skin;
    }

    public function getPref_Skin()
    {
        return $this->pref_skin;
    }

    public function setFiltro_Paciente($filtro_paciente)
    {
        $this->filtro_paciente = $filtro_paciente;
    }

    public function getFiltro_Paciente()
    {
        return $this->filtro_paciente;
    }

    public function setFiltro_Medico($filtro_medico)
    {
        $this->filtro_medico = $filtor_medico;
    }

    public function getFiltro_Medico()
    {
         return $this->filtro_medico;
    }

    public function setFiltro_Secretaria($filtro_secretaria)
    {
        $this->filtro_secretaria = $filtro_secretaria;
    }

    public function getFiltro_Secretaria()
    {
        return $this->filtro_secretaria;
    }

    public function setFiltro_Administrador($filtor_administrador)
    {
        $this->filtro_administrador = $filtor_administrador;
    }

    public function getFiltro_Administrador()
    {
        return $this->filtro_administrador;
    }
}

?>