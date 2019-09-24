<?php
class Anexo
{
    /**Declaração de propriedade */
    private $id;
    private $nome;
    private $caminho;
	
    /**Geters and Seters */
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of caminho
     */ 
    public function getCaminho()
    {
        return $this->caminho;
    }

    /**
     * Set the value of caminho
     *
     * @return  self
     */ 
    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;

        return $this;
    }
}