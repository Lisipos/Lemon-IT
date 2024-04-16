<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">

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
    <!-- <link rel="stylesheet" href="/tema/plugins/fullcalendar/main.css"> -->



    <link href="{{ asset('/tema/css/core/main.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('/tema/css/daygrid/main.min.css') }}" rel='stylesheet' />
    <script src="{{ asset('/tema/js/core/main.min.js') }}"></script>
    <script src="{{ asset('/tema/js/interaction/main.min.js') }}"></script>
    <script src="{{ asset('/tema/js/daygrid/main.min.js') }}"></script>
    <script src="{{ asset('/tema/js/core/locales/pt-br.js') }}"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/tema/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/tema/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/tema/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


    {{-- <script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      themeSystem: 'bootstrap',
      locale: 'pt-br',
      plugins: ['interaction', 'dayGrid'],
      //defaultDate: '2019-04-12',
      editable: true,
      eventLimit: true,
      events: "{{ asset('/tema/listarEventos.php') }}",
      extraParams: function() {
        return {
          cachebuster: new Date().valueOf()
        };
      }
    });

    calendar.render();
  });

  
</script> --}}

<style>
  /* #calendar {
    max-width: 900px;
    margin: 0 auto;
  } */


  @font-face {
    font-family: 'titulo-lemon';
    src: url('/tema/fontes/ka1.ttf') format('truetype');
  }

  @font-face {
    font-family: 'fonte-3d';
    src: url('/tema/fontes/3DIsometric-Bold.ttf') format('truetype');
  }

  .titulo-lemon{
    font-family: 'fonte-3d';
    padding-left: 10%;
    padding-top: 10%;
  }


  /* .contador-pagina{
    height: 100%;
    text-align: center;
  }
  .pagination{
    height: 100%;
    text-align: center;
  } */

  /* Cor de fundo do autocomplete */
input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0 30px #343a40 inset;
}

/* Cor do texto do autocomplete */
input:-webkit-autofill {
  -webkit-text-fill-color: white !important;
}

/* .cnpj {
	display: none;
} */

.input-cpf-cnpj {
	display: none;
}


</style>




</head>


<body
    class="hold-transition dark-mode sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include('site.layouts._partials.nav')

        @yield('conteudo')

        <footer class="main-footer fixed-bottom">
            <strong>Copyright &copy; @php echo date('Y'); @endphp <a href="https://lemonits.com.br">Lemon IT</a>.</strong>
            Todos os direitos resservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>


    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <!-- <script src="/tema/plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap -->
    <script src="{{ asset('/tema/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/tema/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('/tema/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/tema/dist/js/adminlte.js') }}"></script>

    <!-- jQuery UI -->
    <!-- <script src="/tema/plugins/jquery-ui/jquery-ui.min.js"></script> -->

    <!-- fullCalendar 2.2.5 -->
    <!-- <script src="/tema/plugins/moment/moment.min.js"></script>
  <script src="/tema/plugins/fullcalendar/main.js"></script>
  <script src="/tema/plugins/fullcalendar/locales/pt-br.js"></script> -->

    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

    <!-- ChartJS -->
    <script src="{{ asset('/tema/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="dist/js/pages/dashboard2.js"></script>-->
    <script src="{{ asset('/tema/status.js') }}"></script>

    <script>
        windows.setInterval(keepAliveCall, 20000);
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // $("#telefone").mask("(00) 0000-0000");

            var SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('#telefone_responsavel').mask(SPMaskBehavior, spOptions);
            $('#telefone_principal').mask(SPMaskBehavior, spOptions);
            // $("#telefoneResponsavel").mask('(00) 0000Z-0000', {
            //   translation: {
            //     'Z': {
            //       pattern: /[0-9]/,
            //       optional: true
            //     }
            //   }
            // });
            $("#cnpj").mask("00.000.000.0000-00");
            $("#cpf").mask("000.000.000-00");
            $("#mac_address").mask("AA:AA:AA:AA:AA:AA");
            $("#inscricao_estadual").mask("000000000");
            $("#inscricao_municipal").mask("00000000000");
            $("#cep").mask("00000-000");
        });



        $(document).ready(function() {
            $('input:radio[name="customRadio2"]').on("change", function() {
                if (this.checked && this.value == '1') {
                    $("#cnpj, #razao_social, #nome_fantasia, #inscricao").show();
                    $("#cpf").hide();
                    $('#cpf').val("");
                } else {
                    $("#cpf").show();
                    $("#cnpj, #razao_social, #nome_fantasia, #inscricao, #inscricao_estadual, #inscricao_municipal")
                        .hide();
                    $('#inscricao_estadual, #inscricao_municipal, #cnpj, #razao_social, #nome_fantasia').val(
                    "");
                    $("#customRadioInscricaoEstadual, #customRadioInscricaoMunicipal").prop("checked",
                        false);
                }
            });
        });

        $(document).ready(function() {
            $('input:radio[name="customRadio3"]').on("change", function() {
                if (this.checked && this.value == '1') {
                    $("#inscricao_estadual").show();
                    $("#inscricao_municipal").hide();
                    $('#inscricao_municipal').val("");

                } else {
                    $("#inscricao_municipal").show();
                    $("#inscricao_estadual").hide();
                    $("#inscricao_estadual").val("");
                }
            });
        });

        



    </script>
    @php
        if(isset($cliente) && $pagina == "cliente"){
            if( $cliente->cnpj || old('cnpj') !== null ){
                echo'<script type="text/javascript">
                $(document).ready(function() {
                    $("#customRadio2").prop("checked",true);
                    $("#cnpj, #razao_social, #nome_fantasia, #inscricao").show();
                });
                </script>';
            }
        
            if( $cliente->cpf || old('cpf') !== null ){
                echo'<script type="text/javascript">
                $(document).ready(function() {
                    $("#customRadio2").prop("checked",true);
                    $("#cpf").show();
                });
                </script>';
            }


            if( $cliente->inscricao_estadual || old('inscricao_estadual') !== null ){
                echo'<script type="text/javascript">
                $("#inscricao_estadual").show();
                </script>';
            }
            if( $cliente->inscricao_municipal || old('inscricao_municipal') !== null ){
                echo'<script type="text/javascript">
                $("#inscricao_municipal").show();
                $("#customRadioInscricaoMunicipal").prop("checked",
                                true);
                </script>';
            }
        }

    @endphp



    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/tema/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/tema/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/tema/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#listar-numero').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "proc_pesq_user.php",
                    "type": "POST"
                }
            });
        });
    </script>

    <!-- Validação -->
    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>



</body>

</html>