@extends('site.layouts.layout')

@section('titulo', $titulo)

@section('conteudo')
    <div class="content-wrapper">
        <section class="content">
            <div class='container-fluid'>

                @php if (isset($aviso) && $aviso != '') {
                        echo $aviso;
                    }
                @endphp
                <br>
                <div class='card card-success'>
                    <div class='card-header'>
                        <h3 class='card-title'>Aparelhos IP</h3>
                    </div>


                    <div class="container-fluid">
                        <br>
                        <form action="{{ route('app.aparelhoIp.index') }}" method="get">
                            <label for="sel1">Selecione o local:</label>
                            <select name="select_cliente" id="select_cliente" class="form-control select2"
                                data-placeholder="Select a State" style="width: 100%;">
                                <option>Selecione</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}"
                                        {{ old('select_cliente') == $cliente->id_cliente ? 'selected' : '' }}>
                                        {{ $cliente->nome_cliente }}</option>
                                @endforeach
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary">Verificar</button>
                        </form>
                    </div><br>
                </div>
                <div class='card card-success'>
                    <div class='card-header'>
                        <h3 class='card-title'>{{ $total_aparelhos_ip }} - aparelhos encontrados</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class='card-body p-0'>
                        <table class='table table-striped projects'>
                            <thead>
                                <tr>
                                    <th>Modelo</th>
                                    <th>SN</th>
                                    <th>MAC</th>
                                    <th>Patrimonio</th>
                                    <th>Status</th>
                                    <th>Cliente</th>
                                    {{-- <th>Cadastrador por</th>
                                    <th>Alterado por</th> --}}
                                    <th>Ultimo Cliente</th>
                                    <th>Fonte</th>
                                    <th>Base</th>
                                    <th>Monofone</th>
                                    <th>Espiral</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aparelhosIp as $aparelho)
                                    <tr>
                                        @foreach ($modelo_aparelho_ips as $modelo_aparelho_ip)
                                            @if ($modelo_aparelho_ip->id_modelo_aparelho_ip == $aparelho->id_modelo_aparelho_ip)
                                                <td>{{ $modelo_aparelho_ip->modelo_aparelho_ip }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $aparelho->serial_number }}</td>
                                        <td>{{ $aparelho->mac_address }}</td>
                                        <td>{{ $aparelho->bem_patrimonial }}</td>

                                        @foreach ($status_aparelho_ips as $status_aparelho_ip)
                                            @if ($status_aparelho_ip->id_status_aparelho_ip == $aparelho->id_status_aparelho_ip)
                                                <td>{{ $status_aparelho_ip->status_aparelho_ip }}</td>
                                            @endif
                                        @endforeach
                                        @foreach ($clientes as $cliente)
                                            @if ($cliente->id_cliente == $aparelho->id_cliente)
                                                <td>{{ $cliente->nome_cliente }}</td>
                                            @endif
                                        @endforeach

                                        {{-- <td>
                                            <div class='image'>
                                                <img src="{{ asset('/tema/imgPerfil/' . $aparelho->cadastrado_por) }}"
                                                    class='img-circle elevation-2' alt='User Image'>
                                            </div>
                                        </td>

                                        <td>
                                            <div class='image'>
                                                <img src="{{ asset('/tema/imgPerfil/' . $aparelho->alterado_por) }}"
                                                    class='img-circle elevation-2' alt='User Image'>
                                            </div>
                                        </td> --}}

                                        @foreach ($clientes as $cliente)
                                            @if ($cliente->id_cliente == $aparelho->id_ultimo_cliente)
                                                <td>{{ $cliente->nome_cliente }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($fontes as $fonte)
                                            @if ($fonte->id_fonte == $aparelho->id_fonte)
                                                <td>{{ $fonte->voltagem }}, {{ $fonte->amperagem }}</td>
                                            @endif
                                        @endforeach


                                        <td>{{ $aparelho->base == 'on' ? 'Sim' : '' }}</td>
                                        <td>{{ $aparelho->monofone == 'on' ? 'Sim' : '' }}</td>
                                        <td>{{ $aparelho->espiral == 'on' ? 'Sim' : '' }}</td>
                                        <td class='project-actions text-right'>
                                            <a href="{{ route('app.aparelhoIp.edit', $aparelho->id_aparelho_ip) }}">
                                                <button type='submit' class='btn btn-info'>
                                                    <i class='fas fa-pencil-alt'>
                                                    </i>
                                                    Alterar
                                                </button>
                                            </a>
                                            {{-- <form action='{{ route('app.usuario.alterar', ['usuario'=> $usuario->id_usuario]) }}' method='post'>
                                                <button type='submit' class='btn btn-info'>
                                                    <i class='fas fa-pencil-alt'>
                                                    </i>
                                                    Alterar
                                                </button>
                                            </form> --}}
                                            <a href="{{ route('app.aparelhoIp.deletar', $aparelho->id_aparelho_ip) }}">
                                                <button type='submit' class='btn btn-danger'>
                                                    <i class='fas fa-trash'>
                                                    </i>
                                                    Deletar
                                                </button>
                                                </form>
                                            </a>
                                            {{-- <form action='{{ route('app.usuario.deletar', ['usuario'=> $usuario->id_usuario]) }}' method='post'>
                                                <button type='submit' class='btn btn-danger'>
                                                    <i class='fas fa-trash'>
                                                    </i>
                                                    Deletar
                                                </button>
                                            </form> --}}

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="contador-pagina">
                            <p>{{ $aparelhosIp->links() }} </p>
                            <p>Exibindo {{ $aparelhosIp->count() }} aparelhos de {{ $aparelhosIp->total() }} (de
                                {{ $aparelhosIp->firstItem() }} a {{ $aparelhosIp->lastItem() }})</p>
                        </div>


                    </div>
                </div>
        </section>
    </div>
@endsection
