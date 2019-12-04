<?php

include('../php/negocio/class/Pessoa.php');
include('../php/persistencia/PessoaDAO.php');
include('../php/negocio/class/Usuario.php');
include('../php/persistencia/UsuarioDAO.php');
include('../php/negocio/class/Preferencia.php');
include('../php/persistencia/PreferenciaDAO.php');
include('../php/persistencia/MedicoDAO.php');
include('../php/negocio/class/Medico.php');
include('../php/persistencia/EnderecoDAO.php');
include('../php/negocio/class/Endereco.php');
include('../php/persistencia/PaisDAO.php');
include('../php/negocio/class/Pais.php');
include('../php/persistencia/EstadoDAO.php');
include('../php/negocio/class/Estado.php');
include('../php/persistencia/CidadeDAO.php');
include('../php/negocio/class/Cidade.php');
include('../php/persistencia/ContatoDAO.php');
include('../php/negocio/class/Contato.php');

$conexao = new PDO('mysql:host=localhost;dbname=bd_clinica_cordis', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$usuarioDAO = new UsuarioDAO($conexao);
$usuario    = new Usuario;

$usuario->setId($_GET['ID']);

// $usuario->setLogin($_GET['user']);
// $usuario->setSenha($_GET['senha']);
// $usuario->setAtivo(true);
// $usuario->setPerm_Medico(true);
// $usuario->setPerm_Secretaria(false);
// $usuario->setPerm_Paciente(false);
// $usuario->setPerm_Administrador(false);

// if ($usuarioDAO->inserir($usuario)) {
//     echo "Operação realizada com sucesso<br/>";
// } else {
//     echo "Ocorreu um erro na operação<br/>";
// }

$pessoaDAO = new PessoaDAO($conexao);
$pessoa    = $pessoaDAO->getPessoa($usuario->getId());

$pessoa->setNome($_GET['nome']);
$pessoa->setSobrenome($_GET['sobrenome']);
$pessoa->setCPF($_GET['cpf']);
$pessoa->setRG($_GET['rg']);

$data = $_GET['nascimento'];
// echo date('d-m-Y', strtotime($data));
$data = date("Y-m-d",strtotime(str_replace('/','-',$data)));  
// echo date('Y-m-d', strtotime($data));

$pessoa->setNascimento($data);
$pessoa->setEmail($_GET['email']);
$pessoa->setSexo($_GET['sexoPessoa']);

if ($pessoaDAO->alterar($pessoa)) {
    echo "Operação realizada com sucesso<br/>";
} else {
    echo "Ocorreu um erro na operação<br/>";
}

$enderecoDAO = new EnderecoDAO($conexao);
$endereco    = $enderecoDAO->getEndereco($pessoa->getId_Endereco());

$endereco->setLogradouro($_GET['logradouro']);
$endereco->setBairro($_GET['bairro']);
$endereco->setCEP($_GET['cep']);
$endereco->setComplemento($_GET['complemento']);
$endereco->setNumero($_GET['numero']);
$endereco->setId_cidade($_GET['id_cidade']);

if ($enderecoDAO->alterar($endereco)) {
    echo "Operação realizada com sucesso<br/>";
} else {
    echo "Ocorreu um erro na operação<br/>";
}

$medicoDAO = new MedicoDAO($conexao);
$medico    = $medicoDAO->getMedico($usuario->getId());

$medico->setId_Usuario($usuario->getId());
$medico->setCRM($_GET['crm']);
$medico->setEspecialidade($_GET['especialidade']);
$medico->setCorAgenda($_GET['agenda']);
$medico->setAtivo(true);

if ($medicoDAO->alterar($medico)) {
    echo "Operação realizada com sucesso<br/>";
} else {
    echo "Ocorreu um erro na operação<br/>";
}

header('Location:cadastro_medico.php?pag=cad_med');
