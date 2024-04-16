@extends('site.layouts.layout')

@section('titulo', $titulo)

@section('conteudo')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @php 
                if (isset($aviso) && $aviso != '') {
                        echo $aviso;
                    }
                @endphp
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Aparelho IP</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('app.aparelhoIp.store') }}" id="quickForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @if ($errors->has('select_modelo_aparelho_ip'))
                                <li style="color:red;">{{ $errors->first('id_modelo_aparelho_ip') }}</li>
                            @endif
                            {{-- {{ $errors->has('id_modelo_aparelho_ip') ? $errors->first('id_modelo_aparelho_ip') : '' }} --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Modelo</label>
                                <select name="select_modelo_aparelho_ip" id="select_modelo_aparelho_ip"
                                    class="form-control select2" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Selecione</option>
                                    @foreach ($modelo_aparelho_ips as $modelo_aparelho_ip)
                                        <option value="{{ $modelo_aparelho_ip->id_modelo_aparelho_ip }}"
                                            {{ old('select_modelo_aparelho_ip') == $modelo_aparelho_ip->id_modelo_aparelho_ip ? 'selected' : '' }}>
                                            {{ $modelo_aparelho_ip->modelo_aparelho_ip }}
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('serial_number'))
                                <li style="color:red;">{{ $errors->first('serial_number') }}</li>
                            @endif

                            <div class="form-group">
                                <label for="serial_number">SN:</label>
                                <input type="text" class="form-control" id="serial_number" placeholder="SN"
                                    name="serial_number" value="{{ old('serial_number') }}">
                            </div>
                            @if ($errors->has('mac_address'))
                                <li style="color:red;">{{ $errors->first('mac_address') }}</li>
                            @endif
                            <div class="form-group">
                                <label for="mac_address">MAC:</label>
                                <input type="text" class="form-control" id="mac_address" placeholder="MAC"
                                    name="mac_address" value="{{ old('mac_address') }}">
                            </div>
                            @if ($errors->has('bem_patrimonial'))
                                <li style="color:red;">{{ $errors->first('bem_patrimonial') }}</li>
                            @endif
                            <div class="form-group">
                                <label for="bem_patrimonial">Bem Patrimonial:</label>
                                <input type="text" class="form-control" id="bem_patrimonial"
                                    placeholder="Bem Patrimonial" name="bem_patrimonial"
                                    value="{{ old('bem_patrimonial') }}">
                            </div>

                            @if ($errors->has('bem_patrimonial_base'))
                                <li style="color:red;">{{ $errors->first('bem_patrimonial_base') }}</li>
                            @endif
                            <div class="form-group">
                                <label for="bem_patrimonial_base">Bem Patrimonial da base(Caso tenha):</label>
                                <input type="text" class="form-control" id="bem_patrimonial_base"
                                    placeholder="Bem Patrimonial" name="bem_patrimonial_base"
                                    value="{{ old('bem_patrimonial_base') }}">
                            </div>
                            @if ($errors->has('select_status_aparelho_ip'))
                                <li style="color:red;">{{ $errors->first('select_status_aparelho_ip') }}</li>
                            @endif
                            <div class="form-group">
                                <label for="status">status:</label>
                                <select name="select_status_aparelho_ip" id="select_status_aparelho_ip"
                                    class="form-control select2" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Selecione</option>
                                    @foreach ($status_aparelho_ips as $status_aparelho_ip)
                                        <option value="{{ $status_aparelho_ip->id_status_aparelho_ip }}"
                                            {{ old('select_status_aparelho_ip') == $status_aparelho_ip->id_status_aparelho_ip ? 'selected' : '' }}>
                                            {{ $status_aparelho_ip->status_aparelho_ip }}
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('select_cliente'))
                                <li style="color:red;">{{ $errors->first('select_cliente') }}</li>
                            @endif
                            <div class="form-group">
                                <label for="cliente">Cliente:</label>
                                <select name="select_cliente" id="select_cliente" class="form-control select2"
                                    data-placeholder="Select a State" style="width: 100%;">
                                    <option>Selecione</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id_cliente }}"
                                            {{ old('select_cliente') == $cliente->id_cliente ? 'selected' : '' }}>
                                            {{ $cliente->nome_cliente }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('select_fonte'))
                                <li style="color:red;">{{ $errors->first('select_fonte') }}</li>
                            @endif
                            <div class="form-group">
                                <label for="select_fonte">Fonte:</label>
                                <select name="select_fonte" id="select_fonte" class="form-control select2"
                                    data-placeholder="Select a State" style="width: 100%;">
                                    <option>Selecione</option>
                                    @foreach ($fontes as $fonte)
                                        <option value="{{ $fonte->id_fonte }}"
                                            {{ old('select_fonte') == $fonte->id_fonte ? 'selected' : '' }}>
                                            {{ $fonte->voltagem }},{{ $fonte->amperagem }},{{ $fonte->plug }}</option>
                                    @endforeach
                                </select>
                            </div>


                            {{-- <div class="row"> --}}
                            {{-- <pre></pre> --}}
                            {{-- <div class="col-sm"> --}}
                            <div class="form-check">
                                <input type="checkbox" name="base" class="form-check-input" id="base"
                                    {{ old('base') == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="base">Base</label>
                            </div>
                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- <div class="row"> --}}
                            {{-- <pre></pre> --}}
                            {{-- <div class="col-sm"> --}}
                            <div class="form-check">
                                <input type="checkbox" name="monofone" class="form-check-input" id="monofone"
                                    {{ old('monofone') == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="monofone">Monofone</label>
                            </div>
                            {{-- </div> --}}
                            {{-- <div class="col-sm"> --}}
                            <div class="form-check">
                                <input type="checkbox" name="espiral" class="form-check-input" id="espiral"
                                    {{ old('espiral') == 'on' ? 'checked' : '' }}>
                                <label class="form-check-label" for="espiral">Espiral</label>
                            </div>
                            {{-- </div> --}}

                            {{-- </div> --}}


                            <br>
                            <div class="form-group">
                                <label for="observacao">Observação:</label>
                                <input type="text" class="form-control" id="observacao" placeholder="Obsercação"
                                    name="observacao" value="{{ old('observacao') }}">
                            </div>

                            {{-- <div class="form-group">
                                <label for="exampleInputFile">Foto do aparelho</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input id="foto" name="foto" type="file" class="custom-file-input">
                                        <label for="foto" class="custom-file-label text-truncate">Escolha um
                                            arquivo...</label>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
