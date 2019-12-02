<?php

class PessoaDAO {

    private $pdo;

    /**
     * __construct
     *
     * @param  mixed $pdo
     *
     * @return void
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    /**
     * inserir
     *
     * @param  mixed $pessoa
     *
     * @return void
     */
    public function inserir(Pessoa $pessoa) {
        $sql = $this->pdo->prepare('INSERT INTO tb_pessoas (id_usuario, nome, sobrenome, cpf, rg, sexo, nascimento, email, id_endereco) VALUES (:id_usuario, :nome, :sobrenome, :cpf, :rg, :sexo, :nascimento, :email, :id_endereco)');
        $sql->bindValue(':id_usuario', $pessoa->getId_Usuario());
        $sql->bindValue(':nome', $pessoa->getNome());
        $sql->bindValue(':sobrenome', $pessoa->getSobrenome());
        $sql->bindValue(':cpf', $pessoa->getCPF());
        $sql->bindValue(':rg', $pessoa->getRG());
        $sql->bindValue(':sexo', $pessoa->getSexo());
        $sql->bindValue(':nascimento', $pessoa->getNascimento());
        $sql->bindValue(':email', $pessoa->getEmail());
        $sql->bindValue(':id_endereco', $pessoa->getId_Endereco());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }


    /**
     * excluir
     *
     * @param  mixed $pessoa
     *
     * @return void
     */
    public function excluir(Pessoa $pessoa) {
        $sql = $this->pdo->prepare('delete from tb_pessoa where id_usuario = :id');
        $sql->bindValue(':id', $pessoa->getId_Usuario());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    /**
     * getPessoa
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getPessoa($id) {
        $sql = $this->pdo->prepare('select * from tb_pessoas where id_usuario = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $pessoa = new Pessoa();
                
                $pessoa->setId_Usuario($dados->id_usuario);
                $pessoa->setNome($dados->nome);
                $pessoa->setSobrenome($dados->sobrenome);
                $pessoa->setCPF($dados->cpf);
                $pessoa->setRG($dados->rg);
                $pessoa->setSexo($dados->sexo);
                $date = new DateTime($dados->nascimento);
                $pessoa->setNascimento($date->format('d/m/Y H:i:s'));
                $pessoa->setEmail($dados->email);
                $pessoa->setId_Endereco($dados->id_endereco);

                return $pessoa;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    /**
     * getPessoas
     *
     * @return void
     */
    public function getPessoas() {
        $sql = $this->pdo->prepare('select * from tb_pessoas');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $pessoa = new Pessoa();
                
                $pessoa->setId_Usuario($dados->id_usuario);
                $pessoa->setNome($dados->nome);
                $pessoa->setSobrenome($dados->sobrenome);
                $pessoa->setCPF($dados->cpf);
                $pessoa->setRG($dados->rg);
                $pessoa->setSexo($dados->sexo);
                $pessoa->setNascimento($dados->nascimento);
                $pessoa->setEmail($dados->email);
                $pessoa->setId_Endereco($dados->id_endereco);

                $lista[] = $pessoa;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
        
        return $lista;
    }

}
