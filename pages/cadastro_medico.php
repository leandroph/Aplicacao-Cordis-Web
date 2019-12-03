<?php
session_start();

/**
 * Recupera id do usuário logado no sistema
 */
$id_usuario_logado = $_SESSION["id_usuario"];

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

//Conexão com Banco de dados
$conexao = new PDO('mysql:host=localhost;dbname=bd_clinica_cordis', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pessoaDAO = new PessoaDAO($conexao);
$pessoa = $pessoaDAO->getPessoa($id_usuario_logado);

$usuarioDAO = new UsuarioDAO($conexao);
$usuario = $usuarioDAO->getUsuario($id_usuario_logado);

$preferenciaDAO = new PreferenciaDAO($conexao);
$preferencia = $preferenciaDAO->getPreferencia($id_usuario_logado);

$medicoDAO = new MedicoDAO($conexao);
$medicoListaCadastro = $medicoDAO->getMedicos();

$enderecoDAO = new EnderecoDAO($conexao);

$paisDAO = new PaisDAO($conexao);
$paisLista = $paisDAO->getPaises();

$estadoDAO = new EstadoDAO($conexao);
$estadoLista = $estadoDAO->getEstados();

$cidadeDAO = new CidadeDAO($conexao);
$cidadeLista = $cidadeDAO->getCidades();

$pag = $_GET['pag'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Calendar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/Ionicons/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../assets/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="../assets/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include('paginaDinamica/barraLateral.php.'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Lista de Médicos
                </h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol> -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Cadastrar Médico</button>
                                    <!-- <button type="button" class="btn btn-warning btn-flat" data-toggle="modal" data-target="#alterar">Alterar Médico</button>
                                    <button type="button" class="btn btn-danger" onclick="atualizar()">Excluir Médico</button> -->
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">#</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>CRM</th>
                                            <th style="width: 120px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $count = 0;

                                        if ($medicoListaCadastro != null) {
                                            foreach ($medicoListaCadastro as $medicoLista) {
                                                $pessoaLista = $pessoaDAO->getPessoa($medicoLista->getId_Usuario());
                                                $pessoaEndereco = $enderecoDAO->getEndereco($pessoaLista->getId_Usuario());
                                                $count = $count + 1;
                                                $idCidade = $cidadeDAO->getCidade($pessoaEndereco->getId_cidade());
                                                $idEstado = $estadoDAO->getEstado($idCidade->getId_Estado());
                                                $idPais = $paisDAO->getPais($idEstado->getId_Pais());
                                                echo "<tr>";
                                                echo "<td style='display: table-cell; vertical-align:middle; height:100%;'>" . $count . "</td>";
                                                echo "<td style='display: table-cell; vertical-align:middle; height:100%;'>" . $pessoaLista->getNome() . " " . $pessoaLista->getSobrenome() . "</td>";
                                                echo "<td style='display: table-cell; vertical-align:middle; height:100%;'>" . $pessoaLista->getEmail() . "</td>";
                                                echo "<td style='display: table-cell; vertical-align:middle; height:100%;'>" . $medicoLista->getCRM() . "</td>";
                                                echo "<td><a class='btn btn-info' role='button' data-toggle='modal' data-target='#my_modal' data-id='" . $pessoaLista->getId_Usuario() . "' 
                                                data-nome='" . $pessoaLista->getNome() . "' data-sobrenome='" . $pessoaLista->getSobrenome() . "' data-cpf='" . $pessoaLista->getCPF() . "'
                                                data-rg='" . $pessoaLista->getRG() . "' data-sexo='" . $pessoaLista->getSexo() . "' data-nascimento='" . $pessoaLista->getNascimento() . "'
                                                data-email='" . $pessoaLista->getEmail() . "' data-logradouro='" . $pessoaEndereco->getLogradouro() . "' data-bairro='" . $pessoaEndereco->getBairro() . "'
                                                data-cep='" . $pessoaEndereco->getCEP() . "' data-complemento='" . $pessoaEndereco->getComplemento() . "' data-numero='" . $pessoaEndereco->getNumero() . "'
                                                data-cidade='" . $pessoaEndereco->getId_cidade() . "' data-crm='" . $medicoLista->getCRM() . "' data-especialidade='" . $medicoLista->getEspecialidade() . "'
                                                data-agenda='" . $medicoLista->getCorAgenda() . "' data-estado='" . $idEstado->getId() . "' data-pais='" . $idPais->getId() . "'>Editar</a>
                                                    <a class='btn btn-danger' data-toggle='modal' data-target='#my_modal_del'" . $pessoaLista->getId_Usuario() . "' data-id='" . $pessoaLista->getId_Usuario() . "' data-nome='" . $pessoaLista->getNome() . ' ' . $pessoaLista->getSobrenome() . "'>Deletar</a><br/></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<p>Nenhum usuário cadastrado</p>";
                                        }
                                        ?>
                                        <!-- <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td> -->

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 10px;">#</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>CRM</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.13
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <!-- <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../assets/jquery-ui/jquery-ui.min.js"></script>
    <!-- Slimscroll -->
    <script src="../assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->
    <!-- DataTables -->
    <script src="../assets/datatables.net/js/jquery.dataTables.js"></script>
    <script src="../assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- fullCalendar -->
    <script src="../assets/moment/moment.js"></script>
    <script src="../assets/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src='../assets/fullcalendar/dist/locale/pt-br.js'></script>
    <!-- Page specific script -->

    <?php include('paginaDinamica/opcaoLayout.php'); ?>

    <div class="modal" id="my_modal_del">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title text-center"><b>Exclusão de Cadastro</b></h4>
                </div>
                <div class="modal-body" style="">
                    <div class="box-body">
                        <div class="box box-warning">
                            <div class="box-header with-border ">
                                <h3 class="box-title text-center">Tem certeza que deseja escluir este registro?</h3>
                                <br>
                                <form action="excluir.php" method="get">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><b>ID</b></span>
                                                <input readonly type="text" class="form-control" name="id" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><b>Nome</b></span>
                                                <input readonly type="text" class="form-control" name="nome" placeholder="">
                                                <input readonly type="hidden" class="form-control" name="tipo" value="medico">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="text-right">
                                        <button class="btn btn-success" type="submit">Sim</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="my_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title text-center"><b>Editar Cadastro</b></h4>
                </div>
                <div class="modal-body" style="">
                    <div class="box-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Dados Pessoais</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Nome</b></span>
                                            <input type="text" class="form-control" name="nome" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Sobrenome</b></span>
                                            <input type="text" class="form-control" name="sobrenome" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>CPF</b></span>
                                            <input type="text" class="form-control" name="cpf" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>RG</b></span>
                                            <input type="text" class="form-control" name="rg" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Sexo</b></span>
                                            <div class="form-group">
                                                <select id="sexoPessoa" class="form-control">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Nascimento</b></span>
                                            <input type="text" class="form-control" name="nascimento" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Email</b></span>
                                            <input type="text" class="form-control" name="email" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Endereço</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Logradouro</b></span>
                                            <input type="text" class="form-control" name="logradouro" placeholder="">
                                        </div>

                                    </div>
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Bairro</b></span>
                                            <input type="text" class="form-control" name="bairro" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>CEP</b></span>
                                            <input type="text" class="form-control" name="cep" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Complemento</b></span>
                                            <input type="text" class="form-control" name="complemento" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Numero</b></span>
                                            <input type="text" class="form-control" name="numero" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="input-group" id="pais">
                                            <span class="input-group-addon"><b>País</b></span>
                                            <div class="form-group">
                                                <select name="id_pais" id="id_pais" class="form-control">
                                                    <option>Escolher Pais</option>
                                                    <?php

                                                    if ($paisLista != null) {
                                                        foreach ($paisLista as $paises) {
                                                            echo '<option value="' . $paises->getId() . '">' . $paises->getNome() . '</option>';
                                                        }
                                                    } else {
                                                        echo "<p>Nenhum usuário cadastrado</p>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!-- <button id="btnPais" type="button" class="btn btn-info fa fa-refresh"></button> -->
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group" id="estado">
                                            <span class="input-group-addon"><b>Estado</b></span>
                                            <div class="form-group">
                                                <select name="id_estado" id="id_estado" class="form-control">
                                                    <option>Escolher Estado</option>
                                                    <?php

                                                    if ($estadoLista != null) {
                                                        foreach ($estadoLista as $estados) {
                                                            echo '<option value="' . $estados->getId() . '">' . $estados->getNome() . '</option>';
                                                        }
                                                    } else {
                                                        echo "<p>Nenhum usuário cadastrado</p>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group" id="cidade">
                                            <span class="input-group-addon"><b>Cidade</b></span>
                                            <div class="form-group">
                                                <select name="id_cidade" id="id_cidade" class="form-control">
                                                    <option>Escolher Cidade</option>
                                                    <?php

                                                    if ($cidadeLista != null) {
                                                        foreach ($cidadeLista as $cidade) {
                                                            echo '<option value="' . $cidade->getId() . '">' . $cidade->getNome() . '</option>';
                                                        }
                                                    } else {
                                                        echo "<p>Nenhum usuário cadastrado</p>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Dados Médicos</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>CRM</b></span>
                                            <input type="text" class="form-control" name="crm" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Especialidade</b></span>
                                            <input type="text" class="form-control" name="especialidade" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="input-group">
                                            <span class="input-group-addon"><b>Agenda</b></span>
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>Azul</option>
                                                    <option>Vermelho</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <input type="text" class="form-control" name="nome" value="" /> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#my_modal_del').on('show.bs.modal', function(e) {

            var usuaioID = $(e.relatedTarget).data('id');
            var pessoaNome = $(e.relatedTarget).data('nome');

            $(e.currentTarget).find('input[name="id"]').val(usuaioID);
            $(e.currentTarget).find('input[name="nome"]').val(pessoaNome);

        });
    </script>

    <script type="text/javascript">
        $('#my_modal').on('show.bs.modal', function(e) {
            var usuaioID = $(e.relatedTarget).data('ID');
            var pessoaNome = $(e.relatedTarget).data('nome');
            var pessoaSobrenome = $(e.relatedTarget).data('sobrenome');
            var pessoaCPF = $(e.relatedTarget).data('cpf');
            var pessoaRG = $(e.relatedTarget).data('rg');
            var pessoaEmail = $(e.relatedTarget).data('email');
            // var pessoaSexo = $(e.relatedTarget).data('sexo');
            var pessoaNascimento = $(e.relatedTarget).data('nascimento');

            var enderecoLogradouro = $(e.relatedTarget).data('logradouro');
            var enderecoBairro = $(e.relatedTarget).data('bairro');
            var enderecoCEP = $(e.relatedTarget).data('cep');
            var enderecoNumero = $(e.relatedTarget).data('numero');
            var enderecoCidade = $(e.relatedTarget).data('cidade');
            var enderecoComplemento = $(e.relatedTarget).data('complemento');

            var medicoCorAgenda = $(e.relatedTarget).data('corAgenda');
            var medicoCRM = $(e.relatedTarget).data('crm');
            var medicoEspecialidade = $(e.relatedTarget).data('especialidade');

            var pessoaSexo = $(e.relatedTarget).data('sexo');

            var pessoaCidade = $(e.relatedTarget).data('cidade');
            var pessoaEstado = $(e.relatedTarget).data('estado');
            var pessoaPais = $(e.relatedTarget).data('pais');

            $(e.currentTarget).find('input[name="ID"]').val(usuaioID);
            $(e.currentTarget).find('input[name="nome"]').val(pessoaNome);
            $(e.currentTarget).find('input[name="sobrenome"]').val(pessoaSobrenome);
            $(e.currentTarget).find('input[name="cpf"]').val(pessoaCPF);
            $(e.currentTarget).find('input[name="rg"]').val(pessoaRG);
            $(e.currentTarget).find('input[name="email"]').val(pessoaEmail);
            $(e.currentTarget).find('input[name="sexo"]').val(pessoaSexo);
            $(e.currentTarget).find('input[name="nascimento"]').val(pessoaNascimento);
            $(e.currentTarget).find('input[name="logradouro"]').val(enderecoLogradouro);
            $(e.currentTarget).find('input[name="bairro"]').val(enderecoBairro);
            $(e.currentTarget).find('input[name="cep"]').val(enderecoCEP);
            $(e.currentTarget).find('input[name="numero"]').val(enderecoNumero);
            $(e.currentTarget).find('input[name="cidade"]').val(enderecoCidade);
            $(e.currentTarget).find('input[name="complemento"]').val(enderecoComplemento);
            $(e.currentTarget).find('input[name="corAgenda"]').val(medicoCorAgenda);
            $(e.currentTarget).find('input[name="crm"]').val(medicoCRM);
            $(e.currentTarget).find('input[name="especialidade"]').val(medicoEspecialidade);

            $("#id_cidade").val(pessoaCidade);
            $("#id_estado").val(pessoaEstado);
            $("#id_pais").val(pessoaPais);
            $("#sexoPessoa").val(pessoaSexo);

        });
    </script>

    <script>
        $(function() {
            $('#example1').DataTable()
        })
    </script>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">
        $(function() {
            $('#id_pais').change(function() {
                if ($(this).val()) {
                    $('#id_estado').hide();
                    $('.carregando').show();
                    $.getJSON('consulta.php?search=', {
                        id: $(this).val(),
                        tipo: 'pais',
                        ajax: 'true'
                    }, function(j) {
                        var options = '<option value="">Escolha o Estado</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
                        }
                        $('#id_estado').html(options).show();
                        $('.carregando').hide();
                        $('#id_cidade').html('<option value="">Escolha Estado</option>');
                    });
                } else {
                    $('#id_estado').html('<option value="">– Escolha o Estado –</option>');
                }
            });
        });

        $(function() {
            $('#id_estado').change(function() {
                if ($(this).val()) {
                    $('#id_cidade').hide();
                    $('.carregando').show();
                    $.getJSON('consulta.php?search=', {
                        id: $(this).val(),
                        tipo: 'estado',
                        ajax: 'true'
                    }, function(j) {
                        var options = '<option value="">Escolha Cidade</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
                        }
                        $('#id_cidade').html(options).show();
                        $('.carregando').hide();
                    });
                } else {
                    $('#id_cidade').html('<option value="">– Escolha a Cidade –</option>');
                }
            });
        });
    </script>

</body>

</html>