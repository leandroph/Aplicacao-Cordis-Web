<?php

session_start();

include("../bd/conecta.php");

if (isset($_POST['login']) && isset($_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    // $teste = md5($senha);

    $sql = "SELECT 	id, login, senha FROM tb_usuarios where login = '" . $login . "' and senha = '" . $senha . "'";
    
    $resultado = mysqli_query($id_conexao, $sql);
    
    $count = mysqli_num_rows($resultado);

    // echo $count;

    if ($count == 1) {
        
        $dados = mysqli_fetch_array($resultado);
        // Armazena os dados na sessão e redireciona o usuário 
        session_start();

        $_SESSION["id_usuario"] = $dados["id"];
        header("location: ../../pages/administrativo.php");
        
    } else {
        $_SESSION["invalido"] = "negado";
        header("location: ../../index.php");
    }
}
