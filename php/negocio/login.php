<?php

session_start();

include("php/bd/conecta.php");

if(isset($_POST['email']) && isset($_POST['senha'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $teste = md5($senha);

    $get = mysql_query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
    $num = mysql_num_rows($get);

    if($num == 1){
         while($percorrer = mysql_fetch_array($get)){
             $adm = $percorrer['adm'];
$nome = $percorrer['nome'];
session_cache_expire(10);
session_start();
             if($adm == 1){
                 $_SESSION['adm'] = $nome;
             } else{
                 $_SESSION['nor'] = $nome;
             }
             echo '<script type="text/javascript">window.location = "index.html"</script>';
         }
    }else{
        // echo "Email ou senha incorreta"; nessa linha você apenas mostrava os dados errados na mesma pagina login.php
      
      	// aqui voce manda pra session invalido o error que deu no request e redireciona pra index de login
      	$_SESSION["invalido"] = $error;
    	header("location: index.php");
    }
}

?>