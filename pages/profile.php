<?php
session_start();

$id_usuario_logado = $_SESSION["id_usuario"];

include('../php/negocio/class/Pessoa.php');
include('../php/persistencia/PessoaDAO.php');

//Conexão com Banco de dados
$conexao = new PDO('mysql:host=localhost;dbname=bd_clinica_cordis', 'root', '');
$pessoaDAO = new PessoaDAO($conexao);
$pessoa = $pessoaDAO->getPessoa($id_usuario_logado);
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clinica Cordis</title>
    <link rel="icon" href="../dist/img/cardiogram.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../dist/img/cardiogram.png" type="image/x-icon" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

    <link rel="stylesheet" href="../dist/css/personalizado.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>COR</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Clínica Cordis</b> </span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../dist/img/user.png" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $pessoa->getNome(); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="../dist/img/user.png" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $pessoa->getNome() . ' ' . $pessoa->getSobrenome();  ?>
                                        <!-- <small>Member since Nov. 2012</small> -->
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profile.php" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../dist/img/user.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $pessoa->getNome(); ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-green"></i>Online</a>
                    </div>
                </div>



                <?php               ?>



                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <!-- <li class="header">Acesso ADMIN</li> -->
                    <!-- Optionally, you can add icons to the links -->
                    <li class="header">ADMINISTRADOR</li>
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-home"></i> <span>Painel</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="cadastro_medico.php">
                            <i class="fa fa-user-md"></i> <span>Cadastro Médico</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pages/calendar.html">
                            <i class="fa fa-user-plus"></i> <span>Cadastro Secretaria</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pages/calendar.html">
                            <i class="fa fa-flask"></i> <span>Cadastro Exames</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pages/calendar.html">
                            <i class="fa fa-medkit"></i> <span>Cadastro Convenio</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pages/calendar.html">
                            <i class="fa fa-hospital-o"></i> <span>Cadastro Clínica</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="header">MÉDICO</li>
                    <li class="">
                        <a href="pages/calendar.html">
                            <i class="fa fa-calendar"></i> <span>Agenda</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pages/calendar.html">
                            <i class="fa fa-bell-o"></i> <span>Notificações</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pages/calendar.html">
                            <i class="fa fa-pie-chart"></i> <span>Relatorios</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="header">SECRETARIA</li>
                    <li class="">
                        <a href="agenda_secretaria.php">
                            <i class="fa fa-calendar"></i> <span>Agenda</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="secretaria_agenda.php">
                            <i class="fa fa-user-plus"></i> <span>Cadastro de Paciente</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pages/calendar.html">
                            <i class="fa fa-bell-o"></i> <span>Notificações</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pages/calendar.html">
                            <i class="fa fa-pie-chart"></i> <span>Relatorios</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="header">PACIENTE</li>
                    <li class="">
                        <a href="agenda_secretaria.php">
                            <i class="fa fa-calendar"></i> <span>Agenda</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="secretaria_agenda.php">
                            <i class="fa fa-file-o"></i> <span>Prontuario</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Meu Perfil
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile ">
                                <img class="profile-user-img img-responsive img-circle" src="../dist/img/user.png" alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $pessoa->getNome(); ?></h3>

                                <p class="text-muted text-center">TIPO_USUARIO</p>

                                <div class="text-center">
                                    <a href="#" class="btn btn-primary"><b>Editar Imagem</b></a>

                                    <a href="#" class="btn btn-primary"><b>Editar Senha</b></a>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Sobre Mim</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Nome:</b> <a class="pull-right"><?php echo $pessoa->getNome() . ' ' . $pessoa->getSobrenome(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>CPF:</b> <a class="pull-right"><?php echo $pessoa->getCPF(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>RG:</b> <a class="pull-right"><?php echo $pessoa->getRG(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gênero:</b> <a class="pull-right"><?php echo $pessoa->getSexo(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Data de Nascimento:</b> <a class="pull-right"><?php echo $pessoa->getNascimento(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>E-mail:</b> <a class="pull-right"><?php echo $pessoa->getEmail(); ?> </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>CRM:</b> <a class="pull-right">131646549870 </a>
                                    </li>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-primary"><b>Editar Dados Pessoais</b></a>
                                    </div>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Endereço</a></li>
                                <li><a href="#timeline" data-toggle="tab">Contatos</a></li>
                                <li><a href="#settings" data-toggle="tab">Prontuário</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- About Me Box -->
                                    <div class="">

                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <b>Logradouro</b> <a class="pull-right">Daniel Buchholz</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Bairro</b> <a class="pull-right">Daniel Buchholz</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Número</b> <a class="pull-right">456.464.894-05</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>CEP</b> <a class="pull-right">Daniel Buchholz</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Complemento</b> <a class="pull-right">Daniel Buchholz</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Cidade</b> <a class="pull-right">456.464.894-05</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Estado</b> <a class="pull-right">456.464.894-05</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Páis</b> <a class="pull-right">456.464.894-05</a>
                                                </li>
                                                <div class="text-center">
                                                    <a href="#" class="btn btn-primary"><b>Editar Endereço</b></a>
                                                </div>
                                            </ul>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <div class="">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <b>Contato Pessoal:</b> <a class="pull-right">Daniel Buchholz</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Contato Emergencial:</b> <a class="pull-right">456.464.894-05</a>
                                                </li>
                                                <div class="text-center">
                                                    <a href="#" class="btn btn-primary"><b>Editar Contatos</b></a>
                                                </div>
                                            </ul>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>






                </div>
                <!-- /.col -->
        </div>
        <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="../assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>