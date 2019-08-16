<?php
// Conexão com o banco de dados 
require "php/bd/conecta.php";
session_start();

$login_incorreto = false;

if (isset($_POST['acesso'])) {

    $login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;
    // criptografa em MD5 
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : FALSE;

    $sql = "SELECT 	u.id, u.login, u.senha, g.id_usuario, g.id_permissao 
    FROM tb_usuarios u join tb_usuarios_permissoes g on (g.id_usuario = u.id) 
    where 	u.login = '" . $login . "' and u.senha = '" . $senha . "'";

    $resultado = mysqli_query($id_conexao, $sql);

    $count = mysqli_num_rows($resultado);

    // If result matched $myusername and $mypassword, table row must be 1 row
    echo $count;
    if ($count == 1) {

        $login_incorreto = false;

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
        $login_incorreto = true;
    }
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Cordis</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

    <!-- Top content -->
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col col-sm-offset-2 text">
                        <h1><strong>Clínica Cordis</strong></h1>
                        <!-- <div class="description">
                            	<p>
	                            	This is a free responsive login form made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            	</p>
                            </div> -->
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <!-- <div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div> -->
                        <div class="form-bottom">
                            <form role="form" action="" method="POST" name="acesso" class="login-form">
                                <div class="form-group">
                                    <?php if ($login_incorreto) { ?>
                                    <div style="margin-bottom: 20px;">
                                        <h6 class="text-center" style="color:red;">Login ou Senha Incorretos!</h6>
                                    </div>
                                    <?php } ?>
                                    <label class="sr-only" for="form-username">Usuario</label>
                                    <input type="text" name="login" placeholder="Usuario..." class="form-username form-control" id="form-username">
                                    <!-- <div class="valid-feedback">
                                        Looks good!
                                    </div> -->
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Senha</label>
                                    <input type="password" name="senha" placeholder="Senha..." class="form-password form-control" id="form-password">
                                    <!-- <div class="valid-feedback">
                                        Looks good!
                                    </div> -->
                                </div>
                                <button type="submit" name="acesso" class="btn">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...or login with:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>


    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>


</html>