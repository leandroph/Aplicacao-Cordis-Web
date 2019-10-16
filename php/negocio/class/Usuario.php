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
      * Set the value of id
      *
      * @return  self
      */
     public function setId($id)
     {
          $this->id = $id;
     }

     /**
      * Get the value of id
      */
     public function getId()
     {
          return $this->id;
     }

     /**
      * Set the value of login
      *
      * @return  self
      */
     public function setLogin($login)
     {
          $this->login = $login;
     }

     /**
      * Get the value of login
      */
     public function getLogin()
     {
          return $this->login;
     }

     /**
      * Set the value of senha
      *
      * @return  self
      */
     public function setSenha($senha)
     {
          $this->senha = $senha;
     }

     /**
      * Get the value of senha
      */
     public function getSenha()
     {
          return $this->senha;
     }

     /**
      * Set the value of ativo
      *
      * @return  self
      */
     public function setAtivo($ativo)
     {
          $this->ativo = $ativo;
     }

     /**
      * Get the value of ativo
      */
     public function getAtivo()
     {
          return $this->ativo;
     }

     /**
      * Set the value of ativo
      *
      * @return  self
      */
     public function setPerm_Paciente($perm_paciente)
     {
          $this->perm_paciente = $perm_paciente;
     }

     /**
      * Get the value of ativo
      */
     public function getPerm_Paciente()
     {
          return $this->perm_paciente;
     }

     /**
      * Set the value of ativo
      *
      * @return  self
      */
     public function setPerm_Medico($perm_medico)
     {
          $this->perm_medico = $perm_medico;
     }

     /**
      * Get the value of ativo
      */
     public function getPerm_Medico()
     {
          return $this->perm_medico;
     }

     /**
      * Set the value of ativo
      *
      * @return  self
      */
     public function setPerm_Administrador($perm_administrador)
     {
          $this->perm_administrador = $perm_administrador;
     }

     /**
      * Get the value of ativo
      */
     public function getPerm_Administrador()
     {
          return $this->perm_administrador;
     }


     /**
      * Set the value of ativo
      *
      * @return  self
      */
     public function setPerm_Secretaria($perm_secretaria)
     {
          $this->perm_secretaria = $perm_secretaria;
     }

     /**
      * Get the value of ativo
      */
     public function getPerm_Secretaria()
     {
          return $this->perm_secretaria;
     }
}
