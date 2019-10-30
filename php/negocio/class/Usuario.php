<?php
class Usuario
{
     /**Declaração de propriedade */
     private $id;
     private $login;
     private $senha;
     private $ativo;
     private $perm_paciente;
     private $perm_secretaria;
     private $perm_medico;
     private $perm_administrador;

     /**Geters and Seters */

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
     }

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
      * setLogin
      *
      * @param  mixed $login
      *
      * @return void
      */
     public function setLogin($login)
     {
          $this->login = $login;
     }

     /**
      * getLogin
      *
      * @return void
      */
     public function getLogin()
     {
          return $this->login;
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

     /**
      * setPerm_Paciente
      *
      * @param  mixed $perm_paciente
      *
      * @return void
      */
     public function setPerm_Paciente($perm_paciente)
     {
          $this->perm_paciente = $perm_paciente;
     }

     /**
      * getPerm_Paciente
      *
      * @return void
      */
     public function getPerm_Paciente()
     {
          return $this->perm_paciente;
     }

     /**
      * setPerm_Medico
      *
      * @param  mixed $perm_medico
      *
      * @return void
      */
     public function setPerm_Medico($perm_medico)
     {
          $this->perm_medico = $perm_medico;
     }

     /**
      * getPerm_Medico
      *
      * @return void
      */
     public function getPerm_Medico()
     {
          return $this->perm_medico;
     }

     /**
      * setPerm_Administrador
      *
      * @param  mixed $perm_administrador
      *
      * @return void
      */
     public function setPerm_Administrador($perm_administrador)
     {
          $this->perm_administrador = $perm_administrador;
     }

     /**
      * getPerm_Administrador
      *
      * @return void
      */
     public function getPerm_Administrador()
     {
          return $this->perm_administrador;
     }

     /**
      * setPerm_Secretaria
      *
      * @param  mixed $perm_secretaria
      *
      * @return void
      */
     public function setPerm_Secretaria($perm_secretaria)
     {
          $this->perm_secretaria = $perm_secretaria;
     }

     /**
      * getPerm_Secretaria
      *
      * @return void
      */
     public function getPerm_Secretaria()
     {
          return $this->perm_secretaria;
     }
}
