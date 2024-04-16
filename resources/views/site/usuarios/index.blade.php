@extends('site.layouts.layout')

@section('titulo', $titulo)

@section('conteudo')
    <div class="content-wrapper">
        <section class="content">
            <div class='container-fluid'>

                @phpif (isset($aviso) && $aviso != '') {
                        echo $aviso;
                    }
                @endphp

                <div class='card card-success'>
                    <div class='card-header'>
                        <h3 class='card-title'>Usuários</h3>
                    </div>


                    <!-- /.card-header -->
                    <div class='card-body p-0'>
                        <table class='table table-striped projects'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Senha</th>
                                    <th>Autorização</th>
                                    <th>Assinatura</th>
                                    <th>Img. Perfil</th>
                                    <th>Criado em</th>
                                    <th>Alterado em</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id_usuario }}</td>
                                        <td>{{ $usuario->nome_usuario }}</td>
                                        <td>{{ $usuario->email_usuario }}</td>
                                        <td>{{ $usuario->senha_usuario }}</td>
                                        @switch($usuario->id_autorizacao)
                                            @case(1)
                                                <td>Admin</td>
                                            @break

                                            @case(2)
                                                <td>Estagiário</td>
                                            @break

                                            @case(5)
                                                <td>Suporte</td>
                                            @break

                                            @case(6)
                                                <td>Comercial</td>
                                            @break

                                            @case(7)
                                                <td>Diretor</td>
                                            @break

                                            @default
                                        @endswitch
                                        <td>{{ $usuario->url_ass }}</td>
                                        <td>{{ $usuario->url_img_perfil }}</td>
                                        <td>{{ $usuario->created_at }}</td>
                                        <td>{{ $usuario->updated_at }}</td>
                                        <td class='project-actions text-right'>
                                            <a href="{{ route('app.usuario.edit', $usuario->id_usuario) }}">
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
                                            <a href="{{ route('app.usuario.deletar', $usuario->id_usuario) }}">
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
                            <p>{{ $usuarios->links() }} </p>
                            <p>Exibindo {{ $usuarios->count() }} usuários de {{ $usuarios->total() }} (de
                                {{ $usuarios->firstItem() }} a {{ $usuarios->lastItem() }})</p>
                        </div>


                    </div>
                </div>
        </section>
    </div>
@endsection
