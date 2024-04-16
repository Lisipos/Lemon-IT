@section('titulo', $titulo)

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP Lemon</title>

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/tema/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/tema/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/tema/dist/css/adminlte.min.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/tema/favicon32.png') }}" />
    <link rel="stylesheet" href="{{ asset('/tema/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/tema/css.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
        integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>



    <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> -->
    <script type="text/javascript" src="{{ asset('/tema/javascriptpersonalizado.js') }}"></script>


    <!-- fullCalendar -->
    <!-- <link rel="stylesheet" href="{{ asset('/tema/plugins/fullcalendar/main.css') }}"> -->



    <link href='{{ asset('/tema/css/core/main.min.css') }}' rel='stylesheet' />
    <link href='{{ asset('/tema/css/daygrid/main.min.css') }}' rel='stylesheet' />
    <script src='{{ asset('/tema/js/core/main.min.js') }}'></script>
    <script src='{{ asset('/tema/js/interaction/main.min.js') }}'></script>
    <script src='{{ asset('/tema/js/daygrid/main.min.js') }}'></script>
    <script src='{{ asset('/tema/js/core/locales/pt-br.js') }}'></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/tema/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/tema/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/tema/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap',
                locale: 'pt-br',
                plugins: ['interaction', 'dayGrid'],
                //defaultDate: '2019-04-12',
                editable: true,
                eventLimit: true,
                events: '{{ asset('/tema/listarEventos.php') }}',
                extraParams: function() {
                    return {
                        cachebuster: new Date().valueOf()
                    };
                }
            });

            calendar.render();
        });
    </script>

    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }


        @font-face {
            font-family: 'titulo-lemon';
            src: url('{{ asset('/tema/fontes/ka1.ttf') }}') format('truetype');
        }

        @font-face {
            font-family: 'fonte-3d';
            src: url('{{ asset('/tema/fontes/3DIsometric-Bold.ttf') }}') format('truetype');
        }

        .titulo-lemon {
            font-family: 'fonte-3d';
            padding-left: 10%;
            padding-top: 10%;
        }
    </style>
</head>

<body class="hold-transition login-page dark-mode">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <h1><b>Lemon</b>IT</h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Faça o login para iniciar a sessão</p>

                <form action={{ route('site.login') }} method="post">
                    @csrf
                    {{ $errors->has('usuario') ? $errors->first('usuario') : ''}}
                    <div class="input-group mb-3">
                        <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    
                    {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                    <div class="input-group mb-3">
                        <input type="password" value="{{ old('senha') }}" class="form-control" id="senha" name="senha" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                {{ isset($erro) && $erro != '' ? $erro : ''}}
                {{ isset($aviso) && $aviso != '' ? $aviso : ''}}
                {{-- <p class="mb-1">
                    <a href="{{ asset('/tema/esqueciASenha.php') }}">Esqueci minha senha</a>
                </p> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('/tema/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/tema/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/tema/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
