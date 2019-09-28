<?php

session_start();

include("../bd/conecta.php");

if (isset($_POST['login']) && isset($_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    // $teste = md5($senha);

    $sql = "SELECT 	u.id, u.login, u.senha, g.id_usuario, g.id_permissao 
    FROM tb_usuarios u join tb_usuarios_permissoes g on (g.id_usuario = u.id) 
    where 	u.login = '" . $login . "' and u.senha = '" . $senha . "'";
    
    $resultado = mysqli_query($id_conexao, $sql);
    
    $count = mysqli_num_rows($resultado);

    echo $count;

    if ($count == 1) {
        
        $dados = mysqli_fetch_array($resultado);
        // Armazena os dados na sessão e redireciona o usuário 
        session_start();
        $permissao = $dados["id_permissao"];
        $_SESSION["id_pessoa"] = serialize($dados["id_pessoa"]);
        if ($permissao == 1) {
            echo "Administrativo Bem-Vindo";
        } else if ($permissao == 2) {
            echo "Paciente Bem-Vindo";
        } else if ($permissao == 3) {
            echo "Médico Bem-Vindo";
        } else if ($permissao == 4) {
            echo "Secretario Bem-Vindo";
        } else {
            echo "Permissao Invalida";
        }
    } else {
        $_SESSION["invalido"] = $error;
        // header("location: ../../index.php");
    }
}
