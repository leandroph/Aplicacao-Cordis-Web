<?php
class UsuarioPermissao
{
    // declaração de propriedade
	private $id;
	private $id_usuario;
    private $id_permissao;
	
	// Geters and Seters
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}

	public function setIdUsuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}
	
	public function getIdUsuario(){
		return $this->id_usuario;
	}

	public function setIdPermissao($id_permissao){
		$this->id_permissao = $id_permissao;
	}
	
	public function getIdPermissao(){
		return $this->id_permissao;
    }

}