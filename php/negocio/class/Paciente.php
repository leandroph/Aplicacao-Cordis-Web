<?php
class Paciente
{
    /**Declaração de propriedade */
    private $id_usuario;

    /**Geters and Seters */

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
}
