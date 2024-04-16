{{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('/tema/favicon32.png') }}" alt="Lemon" height="60" width="60">
</div> --}}

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('app.index') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">


                <form class="form-inline" method="GET" action="index.php">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            name='pesquisa' id='pesquisa' aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> --}}
    </ul>
</nav>



<!-- Main Sidebar Container -->
<aside class='main-sidebar sidebar-dark-primary elevation-4'>
    <!-- Brand Logo -->
    <a href='{{ route('app.index') }}' class='brand-link'>
        <img src="{{ asset('/tema/favicon32.png') }}" alt='ERP Lemon' class='brand-image elevation-3'
            style='opacity: .8'>
        <span class='brand-text font-weight-light'>LMS</span>
    </a>

    <!-- Sidebar -->
    <div class='sidebar'>
        <!-- Sidebar user panel (optional) -->
        <div class='user-panel mt-3 pb-3 mb-3 d-flex'>
            <div class='image'>
                <img src="{{ asset('/tema/imgPerfil/' . $_SESSION['imgPerfil']) }}" class='img-circle elevation-2'
                    alt='User Image'>
            </div>
            <div class='info'>
                <a href='#' class='d-block'>{{ $_SESSION['nome'] }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class='mt-2'>
            <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu'
                data-accordion='false'>
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                {{-- <li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <p>
                            Dashboard
                            <i class='fas fa-angle-left right'></i>
                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class='nav-item'>
                            <a href='/estoque/index.php?pagina=dashboard' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>PABX</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='/estoque/index.php?pagina=dashboard' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Firewall</p>
                            </a>
                        </li>
                    </ul>

                <li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='nav-icon fas fa-copy'></i>
                        <p>
                            Chamados
                            <i class='fas fa-angle-left right'></i>
                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class='nav-item'>
                            <a href='/estoque/index.php?pagina=chamados' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Chamados</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='/estoque/index.php?pagina=frmCadChamados' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Cadastrar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                </li> --}}
                @if ($_SESSION['nav_estoque'] == 'sim')
                    <li class='nav-item'>
                        <a href='#' class='nav-link'>
                            <i class='nav-icon fas fa-box'></i>
                            <p>
                                Estoque
                                <i class='fas fa-angle-left right'></i>
                            </p>
                        </a>
                        <ul class='nav nav-treeview'>
                            <li class='nav-item'>
                                <a href='{{ route('app.aparelhoIp.index') }}' class='nav-link'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>Aparelhos IP</p>
                                </a>
                            </li>
                            {{-- <li class='nav-item'>
                                <a href='' class='nav-link'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>All In One</p>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                @endif
                @if ($_SESSION['nav_cadastrar'] == 'sim')
                    <li class='nav-item'>
                        <a href='#' class='nav-link'>
                            <i class='nav-icon fas fa-chart-pie'></i>
                            <p>
                                Cadastrar
                                <i class='right fas fa-angle-left'></i>
                            </p>
                        </a>
                        <ul class='nav nav-treeview'>
                            <li class='nav-item'>
                                <a href='{{ route('app.aparelhoIp.cadastro') }}' class='nav-link'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>Aparelho IP</p>
                                </a>
                            </li>
                            {{-- <li class='nav-item'>
                                <a href='' class='nav-link'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>All In One</p>
                                </a>
                            </li> --}}
                            <li class='nav-item'>
                                <a href='{{ route('app.aparelhoIp.cadastro') }}' class='nav-link'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>Modelo de Aparelho IP</p>
                                </a>
                            </li>
                            <!-- <li class='nav-item'>
                <a href='/estoque/index.php?pagina=frmCadNotebook' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Notebook</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='/estoque/index.php?pagina=frmCadOutros' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Outros</p>
                </a>
              </li> -->
                        </ul>
                    </li>
                @endif
                {{-- <li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='nav-icon fas fa-phone'></i>
                        <p>
                            Telefonia
                            <i class='right fas fa-angle-left'></i>
                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class='nav-item'>
                            <a href='/estoque/index.php?pagina=numeros' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Números</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='/estoque/index.php?pagina=frmCadNumeros' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Cadastrar números</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='#' class='nav-link'>
                                <i class='nav-icon fas fa-phone'></i>
                                <p>
                                    <p>Tarifa</p>
                                    <i class='right fas fa-angle-left'></i>
                                </p>
                            </a>
                            <ul class='nav nav-treeview'>
                                <li class='nav-item'>
                                    <a href='/estoque/index.php?pagina=tarifa' class='nav-link'>
                                        <i class='far fa-circle nav-icon'></i>
                                        <p>Tarifas</p>
                                    </a>
                                </li>
                                <li class='nav-item'>
                                    <a href='/estoque/index.php?pagina=frmCadTarifa' class='nav-link'>
                                        <i class='far fa-circle nav-icon'></i>
                                        <p>Cadastrar Tarifa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                @if ($_SESSION['nav_clientes'] == 'sim')
                    <li class='nav-item'>
                        <a href='#' class='nav-link'>
                            <i class='nav-icon fas fa-tree'></i>
                            <p>
                                Clientes
                                <i class='fas fa-angle-left right'></i>
                            </p>
                        </a>
                        <ul class='nav nav-treeview'>
                            <li class='nav-item'>
                                <a href='{{ route('app.cliente.cadastro') }}' class='nav-link'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>Cadastrar Cliente</p>
                                </a>
                            </li>
                            <li class='nav-item'>
                                <a href='{{ route('app.cliente.index') }}' class='nav-link'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>Listar Clientes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if ($_SESSION['nav_usuario'] == 'sim')
                    <li class='nav-item'>
                        <a href='#' class='nav-link'>
                            <i class='nav-icon fas fa-user'></i>
                            <p>
                                Usuários
                                <i class='right fas fa-angle-left'></i>
                            </p>
                        </a>
                        <ul class='nav nav-treeview'>
                            <li class='nav-item'>
                                <a href='{{ route('app.usuario.index') }}' class='nav-link'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>Listar Usuários</p>
                                </a>
                            </li>
                            <li class='nav-item'>
                                <a href='{{ route('app.usuario.cadastro') }}' class='nav-link'>
                                    <i class='far fa-circle nav-icon'></i>
                                    <p>Cadastrar usuários</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                {{-- <li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='nav-icon fas fa-table'></i>
                        <p>
                            Portabilidade
                            <i class='fas fa-angle-left right'></i>
                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class='nav-item'>
                            <a href='/estoque/index.php?pagina=portabilidade' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Portabilidades</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='/estoque/index.php?pagina=frmCadPortabilidade' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Cadastrar Portabilidade</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class='nav-item'>
                    <a href='/estoque/index.php?pagina=frmRamais' class='nav-link'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <p>
                            Criar Ramais
                        </p>
                    </a>
                </li> --}}
                {{-- <li class='nav-item'>
                    <a href='/estoque/index.php?pagina=frmRamais2' class='nav-link'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <p>
                            Criar Ramais Roldão
                        </p>
                    </a>
                </li> --}}
                {{-- <li class='nav-item'>
                    <a href='/estoque/index.php?pagina=calendario' class='nav-link'>
                        <i class='nav-icon fas fa-calendar-alt'></i>
                        <p>
                            Calendario
                        </p>
                    </a>
                </li> --}}
                <li class='nav-item'>
                    <hr>
                </li>
                <li class='nav-item'>
                    <a href="{{ route('app.sair') }}" class='nav-link'>
                        <p>
                            Logoff
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
