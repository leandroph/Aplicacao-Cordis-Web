<?php

include('../php/negocio/class/Usuario.php');
include('../php/persistencia/UsuarioDAO.php');
include('../php/persistencia/MedicoDAO.php');
include('../php/negocio/class/Medico.php');

$conexao = new PDO('mysql:host=localhost;dbname=bd_clinica_cordis', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$usuarioDAO = new UsuarioDAO($conexao);
$usuario    = $usuarioDAO->getUsuario($_GET['id']);

$usuario->setPerm_Medico(false);

if ($usuarioDAO->alterar($usuario)) {
    echo "Operação realizada com sucesso<br/>";
} else {
    echo "Ocorreu um erro na operação<br/>";
}

$medicoDAO = new MedicoDAO($conexao);
$medico    = $medicoDAO->getMedico($usuario->getId());

$medico->setAtivo(false);

if ($medicoDAO->alterar($medico)) {
    echo "Operação realizada com sucesso<br/>";
} else {
    echo "Ocorreu um erro na operação<br/>";
}

header('Location:cadastro_medico.php?pag=cad_med');

?>