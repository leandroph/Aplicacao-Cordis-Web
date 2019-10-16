<?php
session_start();

$id_usuario_logado = $_SESSION["id_usuario"];

include('../php/negocio/class/Pessoa.php');
include('../php/persistencia/PessoaDAO.php');
include('../php/negocio/class/Usuario.php');
include('../php/persistencia/UsuarioDAO.php');
include('../php/negocio/class/Preferencia.php');
include('../php/persistencia/PreferenciaDAO.php');

//Conexão com Banco de dados
$conexao = new PDO('mysql:host=localhost;dbname=bd_clinica_cordis', 'root', '');
$pessoaDAO = new PessoaDAO($conexao);
$pessoa = $pessoaDAO->getPessoa($id_usuario_logado);

$usuarioDAO = new UsuarioDAO($conexao);
$usuario = $usuarioDAO->getUsuario($id_usuario_logado);

$preferenciaDAO = new PreferenciaDAO($conexao);
$preferencia = $preferenciaDAO->getPreferencia($id_usuario_logado);

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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

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
                                        <a href="../php/negocio/logout.php" class="btn btn-default btn-flat">Sair</a>
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

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <!-- <li class="header">Acesso ADMIN</li> -->
                    <!-- Optionally, you can add icons to the links -->
                    <?php if ($usuario->getPerm_Administrador() == 1) { ?>
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
                    <?php }; ?>
                    <?php if ($usuario->getPerm_Medico() == 1) { ?>
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
                    <?php }; ?>
                    <?php if ($usuario->getPerm_Secretaria() == 1) { ?>
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
                    <?php }; ?>
                    <?php if ($usuario->getPerm_Paciente() == 1) { ?>
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
                    <?php }; ?>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Painel
                    <small>Notificações</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Painel</a></li>
                    <!-- <li class="active">Home</li> -->
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
        | Your Page Content Here |
        -------------------------->

                <div class="row">
                    <div class="icheckbox_flat-green checked" aria-checked="true" aria-disabled="false" style="position: relative;"><input type="checkbox" class="flat-red" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>150</h3>

                                <p>Pacientes Agendados</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>53</h3>

                                <p>Pacientes Confirmados</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-checkbox-outline"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>44</h3>

                                <p>Pacientes Atendidos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Pacientes que Faltaram</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-close-circled"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
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

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
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

    <!-- REQUIRED JS SCRIPTS -->

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

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
    <script>
        /**
         * AdminLTE Demo Menu
         * ------------------
         * You should not use this file in production.
         * This file is for demo purposes only.
         */
        $(function() {
            'use strict'

            /**
             * Get access to plugins
             */

            $('[data-toggle="control-sidebar"]').controlSidebar()
            $('[data-toggle="push-menu"]').pushMenu()
            var $pushMenu = $('[data-toggle="push-menu"]').data('lte.pushmenu')
            var $controlSidebar = $('[data-toggle="control-sidebar"]').data('lte.controlsidebar')
            var $layout = $('body').data('lte.layout')
            $(window).on('load', function() {
                // Reinitialize variables on load
                $pushMenu = $('[data-toggle="push-menu"]').data('lte.pushmenu')
                $controlSidebar = $('[data-toggle="control-sidebar"]').data('lte.controlsidebar')
                $layout = $('body').data('lte.layout')
            })

            /**
             * List of all the available skins
             *
             * @type Array
             */
            var mySkins = [
                'skin-blue',
                'skin-black',
                'skin-red',
                'skin-yellow',
                'skin-purple',
                'skin-green',
                'skin-blue-light',
                'skin-black-light',
                'skin-red-light',
                'skin-yellow-light',
                'skin-purple-light',
                'skin-green-light'
            ]

            /**
             * Get a prestored setting
             *
             * @param String name Name of of the setting
             * @returns String The value of the setting | null
             */
            function get(name) {
                if (typeof(Storage) !== 'undefined') {
                    return localStorage.getItem(name)
                } else {
                    window.alert('Please use a modern browser to properly view this template!')
                }
            }

            /**
             * Store a new settings in the browser
             *
             * @param String name Name of the setting
             * @param String val Value of the setting
             * @returns void
             */
            function store(name, val) {
                if (typeof(Storage) !== 'undefined') {
                    localStorage.setItem(name, val)
                } else {
                    window.alert('Please use a modern browser to properly view this template!')
                }
            }

            /**
             * Toggles layout classes
             *
             * @param String cls the layout class to toggle
             * @returns void
             */
            function changeLayout(cls) {
                $('body').toggleClass(cls)
                $layout.fixSidebar()
                if ($('body').hasClass('fixed') && cls == 'fixed') {
                    $pushMenu.expandOnHover()
                    $layout.activate()
                }
                $controlSidebar.fix()
            }

            /**
             * Replaces the old skin with the new skin
             * @param String cls the new skin class
             * @returns Boolean false to prevent link's default action
             */
            function changeSkin(cls) {
                $.each(mySkins, function(i) {
                    $('body').removeClass(mySkins[i])
                })

                $('body').addClass(cls)
                store('skin', cls)
                return false
            }

            /**
             * Retrieve default settings and apply them to the template
             *
             * @returns void
             */
            function setup() {
                var tmp = get('skin')
                if (tmp && $.inArray(tmp, mySkins))
                    changeSkin(tmp)

                // Add the change skin listener
                $('[data-skin]').on('click', function(e) {
                    if ($(this).hasClass('knob'))
                        return
                    e.preventDefault()
                    changeSkin($(this).data('skin'))
                })

                // Add the layout manager
                $('[data-layout]').on('click', function() {
                    changeLayout($(this).data('layout'))
                })

                $('[data-controlsidebar]').on('click', function() {
                    changeLayout($(this).data('controlsidebar'))
                    var slide = !$controlSidebar.options.slide

                    $controlSidebar.options.slide = slide
                    if (!slide)
                        $('.control-sidebar').removeClass('control-sidebar-open')
                })

                $('[data-sidebarskin="toggle"]').on('click', function() {
                    var $sidebar = $('.control-sidebar')
                    if ($sidebar.hasClass('control-sidebar-dark')) {
                        $sidebar.removeClass('control-sidebar-dark')
                        $sidebar.addClass('control-sidebar-light')
                    } else {
                        $sidebar.removeClass('control-sidebar-light')
                        $sidebar.addClass('control-sidebar-dark')
                    }
                })

                $('[data-enable="expandOnHover"]').on('click', function() {
                    $(this).attr('disabled', true)
                    $pushMenu.expandOnHover()
                    if (!$('body').hasClass('sidebar-collapse'))
                        $('[data-layout="sidebar-collapse"]').click()
                })

                //  Reset options
                if ($('body').hasClass('fixed')) {
                    $('[data-layout="fixed"]').attr('checked', 'checked')
                }
                if ($('body').hasClass('layout-boxed')) {
                    $('[data-layout="layout-boxed"]').attr('checked', 'checked')
                }
                if ($('body').hasClass('sidebar-collapse')) {
                    $('[data-layout="sidebar-collapse"]').attr('checked', 'checked')
                }

            }

            // Create the new tab
            var $tabPane = $('<div />', {
                'id': 'control-sidebar-theme-demo-options-tab',
                'class': 'tab-pane active'
            })

            // Create the tab button
            var $tabButton = $('<li />', {
                    'class': 'active'
                })
                .html('<a href=\'#control-sidebar-theme-demo-options-tab\' data-toggle=\'tab\'>' +
                    '<i class="fa fa-wrench"></i>' +
                    '</a>')

            // Add the tab button to the right sidebar tabs
            $('[href="#control-sidebar-home-tab"]')
                .parent()
                .before($tabButton)

            // Create the menu
            var $demoSettings = $('<div />')

            // Layout options
            $demoSettings.append(
                '<h4 class="control-sidebar-heading">' +
                'Preferencias do Usuario' +
                '</h4>' +
                '<h4 class="control-sidebar-heading">' +
                'Página' +
                '</h4>'
                // Fixed layout
                +
                <?php if ($usuario->getPerm_Administrador() == 1) { ?> '<div class="form-group">' +
                    '<label class="control-sidebar-subheading">' +
                    '<input <?php echo ($preferencia->getFiltro_Administrador() == 1 ? 'checked' : ' '); ?> onclick="mudaFiltroADM()" id"CheckAdm" type="checkbox"class="pull-right" /> ' +
                    'Área Administrador' +
                    '</label>' +
                    '</div>' +
                <?php } ?> <?php if ($usuario->getPerm_Medico() == 1) { ?> '<div class="form-group">' +
                    '<label class="control-sidebar-subheading">' +
                    '<input <?php echo ($preferencia->getFiltro_Medico() == 1 ? 'checked' : ' '); ?> onclick="mudaFiltroMED()" id"CheckMed" type="checkbox" class="pull-right"/> ' +
                    'Área Médico' +
                    '</label>' +
                    '</div>' +
                <?php } ?> <?php if ($usuario->getPerm_Secretaria() == 1) { ?> '<div class="form-group">' +
                    '<label class="control-sidebar-subheading">' +
                    '<input <?php echo ($preferencia->getFiltro_Secretaria() == 1 ? 'checked' : ' '); ?> type="checkbox" class="pull-right"/> ' +
                    'Área Secretaria' +
                    '</label>' +
                    '</div>' +
                <?php } ?> <?php if ($usuario->getPerm_Paciente() == 1) { ?> '<div class="form-group">' +
                    '<label class="control-sidebar-subheading">' +
                    '<input <?php echo ($preferencia->getFiltro_Paciente() == 1 ? 'checked' : ' '); ?> type="checkbox" class="pull-right"/> ' +
                    'Área Paciente' +
                    '</label>' +
                    '</div>'
                <?php } ?>
            )
            var $skinsList = $('<ul />', {
                'class': 'list-unstyled clearfix'
            })

            // Dark sidebar skins
            var $skinBlue =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Azul e Preto</p>')
            $skinsList.append($skinBlue)
            var $skinBlack =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Branco e Preto</p>')
            $skinsList.append($skinBlack)
            var $skinPurple =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Roxo e Preto</p>')
            $skinsList.append($skinPurple)
            var $skinGreen =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Verde e Preto</p>')
            $skinsList.append($skinGreen)
            var $skinRed =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Vermelho e Preto</p>')
            $skinsList.append($skinRed)
            var $skinYellow =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Amarelo e Preto</p>')
            $skinsList.append($skinYellow)

            // Light sidebar skins
            var $skinBlueLight =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Azul e Branco</p>')
            $skinsList.append($skinBlueLight)
            var $skinBlackLight =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Branco e Branco</p>')
            $skinsList.append($skinBlackLight)
            var $skinPurpleLight =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Roxo e Branco</p>')
            $skinsList.append($skinPurpleLight)
            var $skinGreenLight =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Verde e Branco</p>')
            $skinsList.append($skinGreenLight)
            var $skinRedLight =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Vermelho e Branco</p>')
            $skinsList.append($skinRedLight)
            var $skinYellowLight =
                $('<li />', {
                    style: 'float:left; width: 33.33333%; padding: 5px;'
                })
                .append('<a href="javascript:void(0)" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">' +
                    '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>' +
                    '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>' +
                    '</a>' +
                    '<p class="text-center no-margin" style="font-size: 12px">Amarelo e Branco</p>')

            $skinsList.append($skinYellowLight)

            $demoSettings.append('<h4 class="control-sidebar-heading">Aparencia</h4>')
            $demoSettings.append($skinsList)

            $tabPane.append($demoSettings)
            $('#control-sidebar-home-tab').after($tabPane)

            setup()

            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        function mudaFiltroADM(){
            var checkBox = document.getElementById("CheckAdm");
            if (checkBox.checked == true) {
                <?php $preferencia->setFiltro_Administrador("1");
                    $preferenciaDAO->alterar($preferencia); ?>
            } else {
                <?php $preferencia->setFiltro_Administrador("0");
                    $preferenciaDAO->alterar($preferencia);  ?>
            }
        }

        function mudaFiltroMED(){
            var checkBox = document.getElementById("CheckMed");
            if (checkBox.checked == true) {
                <?php $preferencia->setFiltro_Medico("1"); 
                    $preferenciaDAO->alterar($preferencia); ?>
            } else {
                <?php $preferencia->setFiltro_Medico("0");
                    $preferenciaDAO->alterar($preferencia);  ?>
            }
        }

        function mudaFiltro(tipo) {
            var checkBox = document.getElementById("myCheck");
            if (checkBox.checked == true) {
                if (tipo = "ADM") {
                    <?php $preferencia->setFiltro_Administrador("1");
                    $preferenciaDAO->alterar($preferencia); ?>
                } else if (tipo = "SEC") {
                    <?php $preferencia->setFiltro_Secretaria("1"); 
                    $preferenciaDAO->alterar($preferencia); ?>
                } else if (tipo = "MED") {
                    <?php $preferencia->setFiltro_Medico("1"); 
                    $preferenciaDAO->alterar($preferencia); ?>
                } else {
                    <?php $preferencia->setFiltro_Paciente("1"); 
                    $preferenciaDAO->alterar($preferencia); ?>
                }

            } else {
                if (tipo = "ADM") {
                    <?php $preferencia->setFiltro_Administrador("0");
                    $preferenciaDAO->alterar($preferencia);  ?>
                } else if (tipo = "SEC") {
                    <?php $preferencia->setFiltro_Secretaria("0");
                    $preferenciaDAO->alterar($preferencia);  ?>
                } else if (tipo = "MED") {
                    <?php $preferencia->setFiltro_Medico("0");
                    $preferenciaDAO->alterar($preferencia);  ?>
                } else {
                    <?php $preferencia->setFiltro_Paciente("0");
                    $preferenciaDAO->alterar($preferencia);  ?>
                }
            }
        }
    </script>


</body>

</html>