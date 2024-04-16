@extends('site.layouts.layout')

@section('titulo', $titulo)

@section('conteudo')
    <div class="content-wrapper">
        <section class="content">
            <div class='container-fluid'>

                @php 
                if (isset($aviso) && $aviso != '') {
                        echo $aviso;
                    }
                @endphp

                <div class='card card-success'>
                    <div class='card-header'>
                        <h3 class='card-title'>Clientes</h3>
                    </div>


                    <!-- /.card-header -->
                    <div class='card-body p-0'>
                        <table class='table table-striped projects'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>CPF/CNJP</th>
                                    <th>Status do contrato</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id_cliente }}</td>
                                        <td>{{ $cliente->nome_cliente }}</td>
                                        <td>@php
                                          if($cliente->cnpj !== null){
                                            echo $cliente->cnpj;
                                          }elseif ($cliente->cpf !== null) {
                                            echo $cliente->cpf;
                                          }
                                        @endphp</td>
                                        @switch($cliente->id_status_contrato)
                                            @case(1)
                                                <td>Aberto</td>
                                            @break

                                            @case(2)
                                                <td>Encerrado</td>
                                            @break

                                            @case(3)
                                                <td>Cancelado</td>
                                            @break

                                            @case(4)
                                                <td>Pendente</td>
                                            @break

                                            @default
                                        @endswitch
                                        <td class='project-actions text-right'>
                                            <a href="{{ route('app.cliente.edit', $cliente->id_cliente) }}">
                                                <button type='submit' class='btn btn-info'>
                                                    <i class='fas fa-pencil-alt'>
                                                    </i>
                                                    Alterar
                                                </button>
                                            </a>
                                            {{-- <form action='{{ route('app.usuario.alterar', ['usuario'=> $cliente->id_cliente]) }}' method='post'>
                                                <button type='submit' class='btn btn-info'>
                                                    <i class='fas fa-pencil-alt'>
                                                    </i>
                                                    Alterar
                                                </button>
                                            </form> --}}
                                            <a href="{{ route('app.cliente.deletar', $cliente->id_cliente) }}">
                                                <button type='submit' class='btn btn-danger'>
                                                    <i class='fas fa-trash'>
                                                    </i>
                                                    Deletar
                                                </button>
                                                </form>
                                            </a>
                                            {{-- <form action='{{ route('app.usuario.deletar', ['usuario'=> $cliente->id_cliente]) }}' method='post'>
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
                            <p>{{ $clientes->links() }} </p>
                            <p>Exibindo {{ $clientes->count() }} usuários de {{ $clientes->total() }} (de
                                {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})</p>
                        </div>


                    </div>
                </div>
        </section>
    </div>
@endsection
