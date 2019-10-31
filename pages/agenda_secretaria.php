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

//Conexão com Banco de dados
$conexao = new PDO('mysql:host=localhost;dbname=bd_clinica_cordis', 'root', '');
$pessoaDAO = new PessoaDAO($conexao);
$pessoa = $pessoaDAO->getPessoa($id_usuario_logado);

$usuarioDAO = new UsuarioDAO($conexao);
$usuario = $usuarioDAO->getUsuario($id_usuario_logado);

$preferenciaDAO = new PreferenciaDAO($conexao);
$preferencia = $preferenciaDAO->getPreferencia($id_usuario_logado);

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
    <!-- fullCalendar -->
    <script src="../assets/moment/moment.js"></script>
    <script src="../assets/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src='../assets/fullcalendar/dist/locale/pt-br.js'></script>
    <!-- Page specific script -->

    <?php include('paginaDinamica/opcaoLayout.php'); ?>

    <script>
        $(function() {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function init_events(ele) {
                ele.each(function() {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    })

                })
            }

            init_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()
            $('#calendar').fullCalendar({
                locale: 'pt-br',
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
                    title: 'ola',
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
</body>

</html>