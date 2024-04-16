@extends('site.layouts.layout')

@section('titulo', $titulo)

@section('conteudo')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @php if( isset($aviso) && $aviso != '' )
                  echo $aviso;
                @endphp
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Alteração de Usuário</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('app.usuario.update',['usuario'=> $usuario->id_usuario]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            {{ $errors->has('id_usuario') ? $errors->first('id_usuario') : '' }}
                            <div class="form-group">
                                {{-- <label for="id_usuario">id:</label> --}}
                                <input type="hidden" class="form-control" id="id_usuario" placeholder="ID"
                                    name="id_usuario" value="{{ $usuario->id_usuario ?? old('id_usuario')}}">
                            </div>
                            {{ $errors->has('nome_usuario') ? $errors->first('nome_usuario') : '' }}
                            <div class="form-group">
                                <label for="nome_usuario">Nome:</label>
                                <input type="text" class="form-control" id="nome_usuario" placeholder="Nome"
                                    name="nome_usuario" value="{{ $usuario->nome_usuario ?? old('nome_usuario')}}">
                            </div>
                            {{ $errors->has('email_usuario') ? $errors->first('email_usuario') : '' }}
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email_usuario" placeholder="E-mail"
                                    name="email_usuario" value="{{ $usuario->email_usuario ?? old('email_usuario') }}">
                            </div>
                            {{ $errors->has('senha_usuario') ? $errors->first('senha_usuario') : '' }}
                            <div class="form-group">
                                <label for="senha_usuario">Senha:</label>
                                <input type="password" class="form-control" id="senha_usuario" placeholder="Senha"
                                    name="senha_usuario" value="{{ $usuario->senha_usuario ?? old('senha_usuario') }}">
                            </div>
                            {{ $errors->has('id_autorizacao') ? $errors->first('id_autorizacao') : '' }}
                            <div class="form-group">
                                <label for="status">Permissão:</label>
                                <select name="id_autorizacao" class="form-control select2" data-placeholder="Select a State"
                                    style="width: 100%;">
                                    <option>Selecione</option>
                                    @foreach ($autorizacoes as $autorizacao)
                                        <option value="{{ $autorizacao->id_autorizacao }}" {{ ($usuario->id_autorizacao ?? old('id_autorizacao')) == $autorizacao->id_autorizacao ? 'selected' : '' }}>{{ $autorizacao->autorizacao }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="url_ass">Nome do aquivo da assinatura:</label>
                                <input type="text" class="form-control" value="{{ $usuario->url_ass ?? old('url_ass') }}" id="url_ass" placeholder="exemplo.png"
                                    name="url_ass">
                            </div>
                            <div class="form-group">
                                <label for="url_img_perfil">Nome do arquivo da imagem de perfil:</label>
                                <input type="text" class="form-control" value="{{ $usuario->url_img_perfil ?? old('url_img_perfil') }}" id="url_img_perfil" placeholder="exemplo.png"
                                    name="url_img_perfil">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Alterar</button>
                            </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
