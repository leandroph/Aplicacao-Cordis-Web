<?php
class Medico
{
  /**Declaração de propriedade */
  private $id_usuario;
  private $corAgenda;
  private $crm;
  private $especialidade;
  private $ativo;

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

  /**
   * setCorAgenda
   *
   * @param  mixed $corAgenda
   *
   * @return void
   */
  public function setCorAgenda($corAgenda)
  {
    $this->corAgenda = $corAgenda;
  }

  /**
   * getCorAgenda
   *
   * @return void
   */
  public function getCorAgenda()
  {
    return $this->corAgenda;
  }

  /**
   * setCrm
   *
   * @param  mixed $crm
   *
   * @return void
   */
  public function setCrm($crm)
  {
    $this->crm = $crm;
  }

  /**
   * getCrm
   *
   * @return void
   */
  public function getCrm()
  {
    return $this->crm;
  }

  /**
   * setEspecialidade
   *
   * @param  mixed $especialidade
   *
   * @return void
   */
  public function setEspecialidade($especialidade)
  {
    $this->especialidade = $especialidade;
  }

  /**
   * getEspecialidade
   *
   * @return void
   */
  public function getEspecialidade()
  {
    return $this->especialidade;
  }

  /**
   * setAtivo
   *
   * @param  mixed $ativo
   *
   * @return void
   */
  public function setAtivo($ativo)
  {
    $this->ativo = $ativo;
  }

  /**
   * getAtivo
   *
   * @return void
   */
  public function getAtivo()
  {
    return $this->ativo;
  }
}
