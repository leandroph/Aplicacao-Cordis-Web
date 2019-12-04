<?php
	/**nome do banco de dados*/
	$dbname="bd_clinica_cordis";
	/**Endereço do servidor*/
	$host="localhost";
	/**User do banco de dados */
	$usuario="root";
	/**Senha do banco de dados */
	$senha="";

	error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	
	/**Efetuando a conexão com o banco */
	if(!($id_conexao = mysqli_connect($host,$usuario,$senha)))
	{
		echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL.";
		exit;
	}

	if(!($conexao = mysqli_select_db($id_conexao, $dbname)))
	{
		/**Retorno em caso de falha na conexão */
		echo "Não foi possível conectar ao banco de dados.";
		exit;
	}
	/** Seta utf8 para registros do banco */
	mysqli_query($id_conexao, "SET NAMES 'utf8'");
?>
