@extends('site.layouts.layout')

@section('titulo', $titulo)

@section('conteudo')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <br>
                @php 
                if (isset($aviso) && $aviso != '') {
                        echo $aviso;
                    }
                @endphp
                
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Cliente</h3>
                    </div>
                    <form action="{{ route('app.cliente.store') }}" id="quickForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            {{ $errors->has('nome_cliente') ? $errors->first('nome_cliente') : '' }}
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nome_cliente">Cliente:</label>
                                        <input type="text" class="form-control" id="nome_cliente" placeholder="Cliente"
                                            name="nome_cliente" value="{{ old('nome_cliente') }}">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-success radio-cpf-cnpj"
                                                type="radio" id="customRadioCNPJ" name="customRadio2" value="1" {{ old('cnpj') !== null ? 'checked' : '' }}>
                                            <label for="customRadioCNPJ" class="custom-control-label">CNPJ</label>

                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-success radio-cpf-cnpj"
                                                type="radio" id="customRadioCPF" name="customRadio2" value="2" {{ old('cpf') !== null ? 'checked' : '' }}>
                                            <label for="customRadioCPF" class="custom-control-label">CPF</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group cnpj">
                                        <!-- <label for="cnpj">CNPJ:</label> -->
                                        <input type="text" class="form-control input-cpf-cnpj" id="cnpj"
                                            placeholder="CNPJ" name="cnpj" value="{{ old('cnpj') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <div class="form-group razaoSocial">
                                        <label class="input-cpf-cnpj" for="razao_social" id="razao_social">Razão
                                            Social:</label>
                                        <input type="text" class="form-control input-cpf-cnpj" id="razao_social"
                                            placeholder="Razão Social" name="razao_social" value="{{ old('razao_social') }}">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group nomeFantasia">
                                        <label class="input-cpf-cnpj" for="nomeFantasia" id="nome_fantasia">Nome
                                            Fantasia:</label>
                                        <input type="text" class="form-control input-cpf-cnpj" id="nome_fantasia"
                                            placeholder="Nome Fantasia" name="nome_fantasia" value="{{ old('nome_fantasia') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group input-cpf-cnpj" id="inscricao">
                                <!-- Start Row -->
                                <div class="row">
                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-success" type="radio"
                                                id="customRadioInscricaoEstadual" name="customRadio3" value="1" {{ old('inscricao_estadual') !== null ? 'checked' : '' }}>
                                            <label for="customRadioInscricaoEstadual" class="custom-control-label">Inscrição
                                                Estadual</label>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-success" type="radio"
                                                id="customRadioInscricaoMunicipal" name="customRadio3" value="2" {{ old('inscricao_municipals') !== null ? 'checked' : '' }}>
                                            <label for="customRadioInscricaoMunicipal"
                                                class="custom-control-label">Inscrição Municipal</label>

                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group" id="divInscricaoEstadual">
                                    <div class="col">
                                        <!-- <label for="cnpj">CNPJ:</label> -->
                                        <input type="text" class="form-control input-cpf-cnpj" id="inscricao_estadual"
                                            placeholder="Inscrição Estadual" name="inscricao_estadual" value="{{ old('inscricao_estadual') }}">
                                    </div>
                                </div>
                                <div class="form-group" id="divInscricaoMunicipal">
                                    <div class="col">
                                        <!-- <label for="cnpj">CNPJ:</label> -->
                                        <input type="text" class="form-control input-cpf-cnpj" id="inscricao_municipal"
                                            placeholder="Inscrição Municipal" name="inscricao_municipal" value="{{ old('inscricao_municipal') }}">
                                    </div>
                                </div>
                            </div>


                            {{ $errors->has('cpf') ? $errors->first('cpf') : '' }}
                            <div class="form-group cpf">
                                <!-- <label for="cpf">CPF:</label> -->
                                <input type="text" class="form-control input-cpf-cnpj cpf" id="cpf"
                                    placeholder="CPF" name="cpf" value="{{ old('cpf') }}">

                            </div>
                            <div class="row">
                                <div class="col">
                                    {{ $errors->has('responsavel') ? $errors->first('responsavel') : '' }}
                                    <div class="form-group">
                                        <label for="Responsavel">Responsavel:</label>
                                        <input type="text" class="form-control" id="responsavel"
                                            placeholder="Responsavel" name="responsavel" value="{{ old('responsavel') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    {{ $errors->has('telefone_responsavel') ? $errors->first('telefone_responsavel') : '' }}
                                    <div class="form-group">
                                        <label for="telefoneResponsavel">Telefone do responsavel:</label>
                                        <input type="text" class="form-control" id="telefone_responsavel"
                                            placeholder="Telefone do responsavel" name="telefone_responsavel" value="{{ old('telefone_responsavel') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    {{ $errors->has('email_responsavel') ? $errors->first('email_responsavel') : '' }}
                                    <div class="form-group">
                                        <label for="email_responsavel">E-mail do responsavel:</label>
                                        <input type="text" class="form-control" id="email_responsavel"
                                            placeholder="E-mail do responsavel" name="email_responsavel" value="{{ old('email_responsavel') }}">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col">
                                    {{ $errors->has('telefone_principal') ? $errors->first('telefone_principal') : '' }}
                                    <div class="form-group">
                                        <label for="telefone_principal">Telefone:</label>
                                        <input type="text" class="form-control" id="telefone_principal"
                                            placeholder="Telefone " name="telefone_principal" value="{{ old('telefone_principal') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    {{ $errors->has('email_principal') ? $errors->first('email_principal') : '' }}
                                    <div class="form-group">
                                        <label for="email_principal">E-mail de contato:</label>
                                        <input type="text" class="form-control" id="email_principal" placeholder="E-mail"
                                            name="email_principal" value="{{ old('email_principal') }}">
                                    </div>
                                </div>

                            </div>






                            <h4>Endereço</h4>
                            <div class="row">
                                <div class="col">
                                    {{ $errors->has('cep') ? $errors->first('cep') : '' }}
                                    <div class="form-group">
                                        <label for="cep">CEP:</label>
                                        <input type="text" class="form-control" id="cep" placeholder="CEP"
                                            name="cep" value="{{ old('cep') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    {{ $errors->has('logradouro') ? $errors->first('logradouro') : '' }}
                                    <div class="form-group">
                                        <label for="logradouro">Logradouro:</label>
                                        <input type="text" class="form-control" id="logradouro"
                                            placeholder="Logradouro" name="logradouro" value="{{ old('logradouro') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    {{ $errors->has('numero') ? $errors->first('numero') : '' }}
                                    <div class="form-group">
                                        <label for="numero">Número:</label>
                                        <input type="text" class="form-control" id="numero" placeholder="Número"
                                            name="numero" value="{{ old('numero') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="numero">Complemento:</label>
                                        <input type="text" class="form-control" id="complemento"
                                            placeholder="Complemento" name="complemento" value="{{ old('complemento') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Site:</label>
                                <input type="text" class="form-control" id="site" placeholder="Site"
                                    name="site" value="{{ old('site') }}">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Contrato</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input id="contrato" name="contrato" type="file"
                                                    class="custom-file-input">
                                                <label for="contrato" class="custom-file-label text-truncate">Escolha um
                                                    arquivo...</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    {{ $errors->has('id_status_contrato') ? $errors->first('id_status_contrato') : '' }}
                                    <div class="form-group">
                                        <label for="status">Status do contrato:</label>
                                        <select name="select_status_contrato" id="select_status_contrato" class="form-control select2"
                                            data-placeholder="Select a State" style="width: 100%;">
                                            <option>Selecione</option>
                                            @foreach ($status_contratos as $status_contrato)
                                                <option value="{{ $status_contrato->id_status_contrato }}"
                                                    {{ old('select_status_contrato') == $status_contrato->id_status_contrato ? 'selected' : '' }}>
                                                    {{ $status_contrato->status_contrato }}
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Proposta</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input id="proposta" name="proposta" type="file" class="custom-file-input">
                                        <label for="proposta" class="custom-file-label text-truncate">Escolha um
                                            arquivo...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Observações do cliente</label>
                                <textarea class="form-control" name="observacao" rows="3" id="observacao" placeholder="Observação ..." value="">{{ old('observacao') }}</textarea>
                            </div>

                            <h3><b>Tipos de contrato</b></h3>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="helpDesk"><b>HelpDesk:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="helpdesk" id="helpdesk" {{ old('helpdesk') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="linkInternet"><b>Link de Internet:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="link_internet" id="link_internet" {{ old('link_internet') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="form-group">
                                        <label for="voip"><b>VOIP:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="voip" id="voip" {{ old('voip') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pabxAnalogico"><b>PABX Analógico:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="pabx_analogico" id="pabx_analogico" {{ old('pabx_analogico') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cftv"><b>CFTV:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cftv" id="cftv" {{ old('cftv') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="firewall"><b>Firewall:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="firewall" id="firewall" {{ old('firewall') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3><b>Locação</b></h3>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="computador"><b>Máquina:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="computador" id="computador" {{ old('computador') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="aparelhoIp"><b>Aparelho IP:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="aparelho_ip" id="aparelho_ip" {{ old('aparelho_ip') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="impressora"><b>Impressora:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="impressora" id="impressora" {{ old('impressora') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pabx"><b>PABX:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="pabx" id="pabx" {{ old('pabx') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="dvr"><b>DVR:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="dvr" id="dvr" {{ old('dvr') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="firewallLoca"><b>Firewall:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="locacao_firewall" id="locacao_firewall" {{ old('locacao_firewall') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="modem"><b>Modem 4G:</b></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="modem" id="modem" {{ old('modem') == 'on' ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
