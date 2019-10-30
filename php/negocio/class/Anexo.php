<?php
class Anexo
{
    /**Declaração de propriedade */
    private $id;
    private $nome;
    private $caminho;
	
    /**Geters and Seters */
    
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
     * setId
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * setNome
     *
     * @param  mixed $nome
     *
     * @return void
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * getCaminho
     *
     * @return void
     */
    public function getCaminho()
    {
        return $this->caminho;
    }

    /**
     * setCaminho
     *
     * @param  mixed $caminho
     *
     * @return void
     */
    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;

        return $this;
    }
}