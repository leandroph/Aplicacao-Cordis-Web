<?php
class Pessoa
{
     /**Declaração de propriedade */
     private $id_usuario;
     private $nome;
     private $sobrenome;
     private $cpf;
     private $rg;
     private $sexo;
     private $nascimento;
     private $email;
     private $id_endereco;

     /**Geters and Seters */

     /**
      * Set the value of id
      *
      * @return  self
      */
     public function setId_Usuario($id_usuario)
     {
          $this->id_usuario = $id_usuario;
     }

     /**
      * Get the value of id
      */
     public function getId_Usuario()
     {
          return $this->id_usuario;
     }

     /**
      * Set the value of nome
      *
      * @return  self
      */
     public function setNome($nome)
     {
          $this->nome = $nome;
     }

     /**
      * Get the value of nome
      */
     public function getNome()
     {
          return $this->nome;
     }

     public function setSobrenome($sobrenome)
     {
          $this->sobrenome = $sobrenome;
     }

     /**
      * Get the value of nome
      */
     public function getSobrenome()
     {
          return $this->sobrenome;
     }

     public function setCPF($cpf)
     {
          $this->cpf = $cpf;
     }

     /**
      * Get the value of nome
      */
     public function getCPF()
     {
          return $this->cpf;
     }

     public function setRG($rg)
     {
          $this->rg = $rg;
     }

     /**
      * Get the value of nome
      */
     public function getRG()
     {
          return $this->rg;
     }

     public function setSexo($sexo)
     {
          $this->sexo = $sexo;
     }

     /**
      * Get the value of nome
      */
     public function getSexo()
     {
          return $this->sexo;
     }

     public function setNascimento($nascimento)
     {
          $this->nascimento = $nascimento;
     }

     /**
      * Get the value of nome
      */
     public function getNascimento()
     {
          return $this->nascimento;
     }

     public function setEmail($email)
     {
          $this->email = $email;
     }

     /**
      * Get the value of nome
      */
     public function getEmail()
     {
          return $this->email;
     }

     public function setId_Endereco($id_endereco)
     {
          $this->id_endereco = $id_endereco;
     }

     /**
      * Get the value of nome
      */
     public function getId_Endereco()
     {
          return $this->id_endereco;
     }
}

?>
