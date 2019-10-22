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