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
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <!-- fullCalendar -->
    <link href='../assets/fullcalendar/css/bootstrap.min.css' rel='stylesheet'>
    <link href='../assets/fullcalendar/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='../assets/fullcalendar/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <link href='../assets/fullcalendar/css/personalizado.css' rel='stylesheet' />
    <script src='../assets/fullcalendar/js/jquery.min.js'></script>
    <script src='../assets/fullcalendar/js/bootstrap.min.js'></script>
    <script src='../assets/fullcalendar/js/moment.min.js'></script>
    <script src='../assets/fullcalendar/js/fullcalendar.min.js'></script>
    <script src='../assets/fullcalendar/locale/pt-br.js'></script>

    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        #calendar {
            max-width: 100%;
            margin: 0 auto;
            text-transform: capitalize;
        }
    </style>
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
                    <li class="">
                        <a href="administrativo.php">
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
                    <li class="active">
                        <a href="secretaria_agenda.php">
                            <i class="fa fa-calendar"></i> <span>Agenda</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="pages/calendar.html">
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
                    <!-- <li class="header">Acesso Client</li>
          <li>
            <a href="pages/calendar.html">
              <i class="fa fa-stethoscope"></i> <span>Consultas</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li>
            <a href="pages/calendar.html">
              <i class="fa fa-calendar"></i> <span>Agenda</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li>
            <a href="pages/calendar.html">
              <i class="fa fa-flask"></i> <span>Exames</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-line-chart"></i> <span>Relatorios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Paciente</a></li>
              <li><a href="#">Médico</a></li>
              <li><a href="#">Secretária</a></li>
              <li><a href="#">Consulta</a></li>
              <li><a href="#">Exame</a></li>
              <li><a href="#">Convenio</a></li>
              <li><a href="#">Prontuários</a></li>
            </ul>
          </li>
        </ul> -->
                    <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <!-- Content Wrapper. Contains page content -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Calendar
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Calendar</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h4 class="box-title">Draggable Events</h4>
                            </div>
                            <div class="box-body">
                                <!-- the events -->
                                <div id="external-events">
                                    <div class="external-event bg-green">Lunch</div>
                                    <div class="external-event bg-yellow">Go home</div>
                                    <div class="external-event bg-aqua">Do homework</div>
                                    <div class="external-event bg-light-blue">Work on UI design</div>
                                    <div class="external-event bg-red">Sleep tight</div>
                                    <div class="checkbox">
                                        <label for="drop-remove">
                                            <input type="checkbox" id="drop-remove">
                                            remove after drop
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /. box -->
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create Event</h3>
                            </div>
                            <div class="box-body">
                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                    <ul class="fc-color-picker" id="color-chooser">
                                        <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /btn-group -->
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                                    <div class="input-group-btn">
                                        <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                                    </div>
                                    <!-- /btn-group -->
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-body no-padding">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /. box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>




        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <!-- <script src="assets/jquery/dist/jquery.min.js"></script> -->
        <!-- Bootstrap 3.3.7 -->
        <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>

        <!-- script de tradução -->

        <script>
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    aspectRatio: 1.6,
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: date,
                    navLinks: false, // can click day/week names to navigate views
                    editable: false,
                    eventLimit: true, // allow "more" link when too many events
                    eventClick: function(event) {

                        $('#visualizar #id').text(event.id);
                        $('#visualizar #id').val(event.id);
                        $('#visualizar #title').text(event.title);
                        $('#visualizar #title').val(event.title);
                        $('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #color').val(event.color);
                        $('#visualizar').modal('show');
                        return false;

                    },

                    selectable: true,
                    selectHelper: true,
                    select: function(start, end) {
                        $('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
                        $('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
                        $('#cadastrar').modal('show');
                    },

                    events: [{
                        id: '1',
                        title: "<?php echo "olá"; ?>",
                        start: '2019-09-23 09:00:00',
                        end: '2019-09-23 11:00:00',
                        color: '#0071c5',
                    }, {
                        id: '2',
                        title: 'Teste',
                        start: '2019-09-24 09:00:00',
                        end: '2019-09-24 11:00:00',
                        color: '#0071c5',
                    }, ]
                });

                // calendar.render();
            });

            //Mascara para o campo data e hora
            function DataHora(evento, objeto) {
                var keypress = (window.event) ? event.keyCode : evento.which;
                campo = eval(objeto);
                if (campo.value == '00/00/0000 00:00:00') {
                    campo.value = ""
                }

                caracteres = '0123456789';
                separacao1 = '/';
                separacao2 = ' ';
                separacao3 = ':';
                conjunto1 = 2;
                conjunto2 = 5;
                conjunto3 = 10;
                conjunto4 = 13;
                conjunto5 = 16;
                if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
                    if (campo.value.length == conjunto1)
                        campo.value = campo.value + separacao1;
                    else if (campo.value.length == conjunto2)
                        campo.value = campo.value + separacao1;
                    else if (campo.value.length == conjunto3)
                        campo.value = campo.value + separacao2;
                    else if (campo.value.length == conjunto4)
                        campo.value = campo.value + separacao3;
                    else if (campo.value.length == conjunto5)
                        campo.value = campo.value + separacao3;
                } else {
                    event.returnValue = false;
                }
            }
        </script>

        <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Dados do Evento</h4>
                    </div>
                    <div class="modal-body">
                        <div class="visualizar">
                            <dl class="dl-horizontal">
                                <dt>ID do Evento</dt>
                                <dd id="id"></dd>
                                <dt>Titulo do Evento</dt>
                                <dd id="title"></dd>
                                <dt>Inicio do Evento</dt>
                                <dd id="start"></dd>
                                <dt>Fim do Evento</dt>
                                <dd id="end"></dd>
                            </dl>
                            <button class="btn btn-canc-vis btn-warning">Editar</button>
                        </div>
                        <div class="form">
                            <form class="form-horizontal" method="POST" action="proc_edit_evento.php">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Cor</label>
                                    <div class="col-sm-10">
                                        <select name="color" class="form-control" id="color">
                                            <option value="">Selecione</option>
                                            <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                            <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                            <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                            <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                            <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                            <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                            <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                            <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                            <option style="color:#228B22;" value="#228B22">Verde</option>
                                            <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="id" id="id">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="button" class="btn btn-canc-edit btn-primary">Cancelar</button>
                                        <button type="submit" class="btn btn-warning">Salvar Alterações</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Cadastrar Evento</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="proc_cad_evento.php">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" placeholder="Titulo do Evento">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Cor</label>
                                <div class="col-sm-10">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Selecione</option>
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                        <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                        <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                        <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('.btn-canc-vis').on("click", function() {
                $('.form').slideToggle();
                $('.visualizar').slideToggle();
            });
            $('.btn-canc-edit').on("click", function() {
                $('.visualizar').slideToggle();
                $('.form').slideToggle();
            });
        </script>


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
                <li class="active"><a href="#control-sidebar-theme-demo-options-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-wrench"></i></a></li>
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div id="control-sidebar-theme-demo-options-tab" class="tab-pane active">
                    <div>
                        <h4 class="control-sidebar-heading">Layout Options</h4>
                        <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-layout="fixed" class="pull-right"> Fixed layout</label>
                            <p>Activate the fixed layout. You can't use fixed and boxed layouts together</p>
                        </div>
                        <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-layout="layout-boxed" class="pull-right"> Boxed Layout</label>
                            <p>Activate the boxed layout</p>
                        </div>
                        <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-layout="sidebar-collapse" class="pull-right"> Toggle Sidebar</label>
                            <p>Toggle the left sidebar's state (open or collapse)</p>
                        </div>
                        <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-enable="expandOnHover" class="pull-right"> Sidebar Expand on Hover</label>
                            <p>Let the sidebar mini expand on hover</p>
                        </div>
                        <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-controlsidebar="control-sidebar-open" class="pull-right"> Toggle Right Sidebar Slide</label>
                            <p>Toggle between slide over content and push content effects</p>
                        </div>
                        <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-sidebarskin="toggle" class="pull-right"> Toggle Right Sidebar Skin</label>
                            <p>Toggle between dark and light skins for the right sidebar</p>
                        </div>
                        <h4 class="control-sidebar-heading">Skins</h4>
                        <ul class="list-unstyled clearfix">
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin">Blue</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin">Black</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin">Purple</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin">Green</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin">Red</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin">Yellow</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Blue Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Black Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Purple Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Green Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Red Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                    <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Yellow Light</p>
                            </li>
                        </ul>
                    </div>
                </div>
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

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>