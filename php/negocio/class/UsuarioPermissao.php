<?php
class UsuarioPermissao
{
     /**Declaração de propriedade */
     private $id;
     private $id_usuario;
     private $id_permissao;

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
      * setIdUsuario
      *
      * @param  mixed $id_usuario
      *
      * @return void
      */
     public function setIdUsuario($id_usuario)
     {
          $this->id_usuario = $id_usuario;
     }

     /**
      * getIdUsuario
      *
      * @return void
      */
     public function getIdUsuario()
     {
          return $this->id_usuario;
     }

     /**
      * setIdPermissao
      *
      * @param  mixed $id_permissao
      *
      * @return void
      */
     public function setIdPermissao($id_permissao)
     {
          $this->id_permissao = $id_permissao;
     }

     /**
      * getIdPermissao
      *
      * @return void
      */
     public function getIdPermissao()
     {
          return $this->id_permissao;
     }
}
