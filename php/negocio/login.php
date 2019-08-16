<?php
// Conexão com o banco de dados 
require "../bd/conecta.php";

// Inicia sessões 
session_start();

$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;
// criptografa em MD5 
$senha = isset($_POST["senha"]) ? md5($_POST["senha"]) : FALSE;

// Usuário não forneceu a senha ou o login 
if (!$login || !$senha) {
	echo "Você deve digitar sua senha e login!";
	exit;
}


$sql = "SELECT 	u.id_usuario, u.id_pessoa, u.usuario, u.senha, g.id_grupo, g.id_usuario
FROM   	usuario u
join usuarios_grupo g on (g.id_usuario = u.id_usuario)
where 	u.usuario =  '" . $login . "' and u.senha = '" . $senha . "'";

$resultado = mysqli_query($id_conexao, $sql);

if (mysqli_num_rows($resultado) == 1) {

	$dados = mysqli_fetch_array($resultado);
	// Armazena os dados na sessão e redireciona o usuário 
	session_start();
	$grupo = $dados["id_grupo"];

	$_SESSION["id_pessoa"] = serialize($dados["id_pessoa"]);

	if ($grupo == 1) {
		header('Location: ../view/areaADM.php');
	} else {
		header('Location: ../view/areaCliente.php');
	}
} else {
	session_start();
	
	$_SESSION["resposta"]= serialize("negado"); 
	header('Location: ../view/formLogin.php');
}
