<?php

include('../php/negocio/class/Usuario.php');
include('../php/persistencia/UsuarioDAO.php');
include('../php/persistencia/MedicoDAO.php');
include('../php/negocio/class/Medico.php');

$conexao = new PDO('mysql:host=localhost;dbname=bd_clinica_cordis', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$usuarioDAO = new UsuarioDAO($conexao);
$usuario    = $usuarioDAO->getUsuario($_GET['id']);

$usuario->setPerm_Medico(true);

if ($usuarioDAO->alterar($usuario)) {
    echo "Operação realizada com sucesso<br/>";
} else {
    echo "Ocorreu um erro na operação<br/>";
}

$medicoDAO = new MedicoDAO($conexao);
$medico    = new Medico;

$medico->setAtivo(true);
$medico->setCrm($_GET['crm']);
$medico->setEspecialidade($_GET['especialidade']);
$medico->setId_Usuario($usuario->getId());
$medico->setCorAgenda($_GET['agenda']);

if ($medicoDAO->inserir($medico)) {
    echo "Operação realizada com sucesso<br/>";
} else {
    echo "Ocorreu um erro na operação<br/>";
}

header('Location:cadastro_medico.php?pag=cad_med');

?>