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
      * setNome
      *
      * @param  mixed $nome
      *
      * @return void
      */
     public function setNome($nome)
     {
          $this->nome = $nome;
     }

     /**
      * getNome
      *
      * @return void
      */
     public function getNome()
     {
          return $this->nome;
     }

     /**
      * setSobrenome
      *
      * @param  mixed $sobrenome
      *
      * @return void
      */
     public function setSobrenome($sobrenome)
     {
          $this->sobrenome = $sobrenome;
     }

     /**
      * getSobrenome
      *
      * @return void
      */
     public function getSobrenome()
     {
          return $this->sobrenome;
     }

     /**
      * setCPF
      *
      * @param  mixed $cpf
      *
      * @return void
      */
     public function setCPF($cpf)
     {
          $this->cpf = $cpf;
     }

     /**
      * getCPF
      *
      * @return void
      */
     public function getCPF()
     {
          return $this->cpf;
     }

     /**
      * setRG
      *
      * @param  mixed $rg
      *
      * @return void
      */
     public function setRG($rg)
     {
          $this->rg = $rg;
     }

     /**
      * getRG
      *
      * @return void
      */
     public function getRG()
     {
          return $this->rg;
     }

     /**
      * setSexo
      *
      * @param  mixed $sexo
      *
      * @return void
      */
     public function setSexo($sexo)
     {
          $this->sexo = $sexo;
     }

     /**
      * getSexo
      *
      * @return void
      */
     public function getSexo()
     {
          return $this->sexo;
     }

     /**
      * setNascimento
      *
      * @param  mixed $nascimento
      *
      * @return void
      */
     public function setNascimento($nascimento)
     {
          $this->nascimento = $nascimento;
     }

     /**
      * getNascimento
      *
      * @return void
      */
     public function getNascimento()
     {
          return $this->nascimento;
     }

     /**
      * setEmail
      *
      * @param  mixed $email
      *
      * @return void
      */
     public function setEmail($email)
     {
          $this->email = $email;
     }

     /**
      * getEmail
      *
      * @return void
      */
     public function getEmail()
     {
          return $this->email;
     }

     /**
      * setId_Endereco
      *
      * @param  mixed $id_endereco
      *
      * @return void
      */
     public function setId_Endereco($id_endereco)
     {
          $this->id_endereco = $id_endereco;
     }

     /**
      * getId_Endereco
      *
      * @return void
      */
     public function getId_Endereco()
     {
          return $this->id_endereco;
     }
}

?>
