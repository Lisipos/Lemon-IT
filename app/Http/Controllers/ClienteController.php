<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
Use App\Models\StatusContrato;

class ClienteController extends Controller
{
    //
    public function cadastro(Request $request)
    {
        $cliente = new Cliente();
        $aviso = '';
        if ($request->get('aviso') == 1) {
            $aviso = '<div class="message">
            <div class="alert alert-success">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Cliente cadastrado com sucesso.
            </div>
          </div>';
        }

        $status_contratos = StatusContrato::all();


        return view('site.cliente.cadastro', ['titulo' => 'Cadastro de Usuario','cliente'=>$cliente, 'status_contratos' => $status_contratos, 'aviso' => $aviso,'pagina'=>'cliente']);
    }

    public function store(Request $request)
    {

        $regras = [
            'nome_cliente' =>  'required',
            // 'razao_social' =>  'required',
            // 'nome_fantasia' =>  'required',
            // 'cnpj' =>  'required',
            // 'cpf' =>  'required',
            // 'inscricao_estadual' =>  'required',
            // 'inscricao_municipal' =>  'required',
            // 'email_principal' =>  'email|required',
            // 'logradouro' =>  'required',
            // 'cep' =>  'required',
            // 'numero' =>  'required',
            // 'complemento' =>  'required',
            // 'telefone_principal' =>  'required',
            // 'responsavel' =>  'required',
            // 'telefone_responsavel' =>  'required',
            // 'email_responsavel' =>  'email|required',
            // 'site' =>  'required',
            // 'url_contrato' =>  'required',
            'select_status_contrato' =>  'exists:status_contrato,id_status_contrato|required'
            // 'url_proposta' =>  'required',
            // 'observacao' =>  'required',
            // 'helpdesk' =>  'required',
            // 'link_internet' =>  'required',
            // 'voip' =>  'required',
            // 'pabx_analogico' =>  'required',
            // 'cftv' =>  'required',
            // 'firewall' =>  'required',
            // 'computador' =>  'required',
            // 'aparelho_ip' =>  'required',
            // 'impressora' =>  'required',
            // 'pabx' =>  'required',
            // 'dvr' =>  'required',
            // 'locacao_firewall' =>  'required',
            // 'modem' =>  'required'
        ];


        $feedback = [
            // 'nome_cliente.required' => 'O campo Nome é obrigatório',
            // 'email_principal.email' => 'O campo Email Principal deve ser um e-mail',
            // 'email_principal.required' => 'O campo Email Principal é obrigatório',
            // 'logradouro.required' => 'O campo Logradouro é obrigatório',
            // 'cep.required' => 'O campo CEP é obrigatório',
            // 'numero.required' => 'O campo Número é obrigatório',
            // 'telefone_principal.required' => 'O campo Telefone Principal é obrigatório',
            // 'responsavel.required' => 'O campo Responsável é obrigatório',
            // 'email_responsavel.required' => 'O campo Email Responsável é obrigatório',
            // 'email_responsavel.email' => 'O campo Email Responsável deve ser um e-mail',
            'select_status_contrato.required' => 'O campo Status Contrato é obrigatório',
            'id_status_contrato.exists' => 'Não é uma opção válida'

        ];

        $request->validate($regras, $feedback);

        $cliente = new Cliente();

        $cliente->nome_cliente = $request->input('nome_cliente');
        $cliente->cnpj = $request->input('cnpj');
        $cliente->razao_social = $request->input('razao_social');
        $cliente->nome_fantasia = $request->input('nome_fantasia');
        $cliente->inscricao_estadual = $request->input('inscricao_estadual');
        $cliente->cpf = $request->input('cpf');
        $cliente->responsavel = $request->input('responsavel');
        $cliente->telefone_responsavel = $request->input('telefone_responsavel');
        $cliente->email_responsavel = $request->input('email_responsavel');
        $cliente->telefone_principal = $request->input('telefone_principal');
        $cliente->cep = $request->input('cep');
        $cliente->logradouro = $request->input('logradouro');
        $cliente->numero = $request->input('numero');
        $cliente->complemento = $request->input('complemento');
        $cliente->site = $request->input('site');
        $cliente->url_contrato = $request->input('url_contrato');
        $cliente->id_status_contrato = $request->input('select_status_contrato');
        $cliente->url_proposta = $request->input('url_proposta');
        $cliente->observacao = $request->input('observacao');
        $cliente->helpdesk = $request->input('helpdesk');
        $cliente->link_internet = $request->input('link_internet');
        $cliente->voip = $request->input('voip');
        $cliente->pabx_analogico = $request->input('pabx_analogico');
        $cliente->cftv = $request->input('cftv');
        $cliente->firewall = $request->input('firewall');
        $cliente->computador = $request->input('computador');
        $cliente->impressora = $request->input('impressora');
        $cliente->pabx = $request->input('pabx');
        $cliente->dvr = $request->input('dvr');
        $cliente->locacao_firewall = $request->input('locacao_firewall');
        $cliente->modem = $request->input('modem');

        $cliente->save();
        return redirect()->route('app.cliente.cadastro', ['aviso' => 1,'pagina'=>'cliente']);
    }


    public function listar(Request $request){
        $aviso = '';
        if ($request->get('aviso') == 1) {
            $aviso = '<div class="message">
            <div class="alert alert-success">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Cliente alterado com sucesso.
            </div>
          </div>';
        }
        if ($request->get('aviso') == 2) {
            $aviso = '<div class="message">
            <div class="alert alert-warning">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Cliente não alterado.
            </div>
          </div>';
        }
        if ($request->get('aviso') == 3) {
            $aviso = '<div class="message">
            <div class="alert alert-danger">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Cliente deletado com sucesso.
            </div>
          </div>';
        }
        $clientes = Cliente::paginate(10);
        return view('site.cliente.index',['titulo' => 'Clientes','clientes'=>$clientes, 'request'=>$request->all(), 'aviso' => $aviso,'pagina'=>'cliente']);
    }


    public function edit($id_cliente){
        
        $cliente = Cliente::find($id_cliente);

        $status_contrato = StatusContrato::all();

        return view('site.cliente.alterar', ['titulo' => 'Alterar Usuário','cliente'=>$cliente, 'status_contrato' => $status_contrato,'pagina'=>'cliente']);
    }

    public function update(Request $request){
        // dd($request);
        $cliente = Cliente::find($request->id_cliente);

        if($cliente->helpdesk !== $request->helpdesk){
          $cliente->helpdesk = null;
        }

        if($cliente->link_internet !== $request->link_internet){
          $cliente->link_internet = null;
        }

        if($cliente->voip !== $request->voip){
          $cliente->voip = null;
        }

        if($cliente->pabx_analogico !== $request->pabx_analogico){
          $cliente->pabx_analogico = null;
        }
        if($cliente->cftv !== $request->cftv){
          $cliente->cftv = null;
        }
        if($cliente->firewall !== $request->firewall){
          $cliente->firewall = null;
        }
        if($cliente->computador !== $request->computador){
          $cliente->computador = null;
        }
        if($cliente->aparelho_ip !== $request->aparelho_ip){
          $cliente->aparelho_ip = null;
        }
        if($cliente->impressora !== $request->impressora){
          $cliente->impressora = null;
        }
        if($cliente->pabx !== $request->pabx){
          $cliente->pabx = null;
        }
        if($cliente->dvr !== $request->dvr){
          $cliente->dvr = null;
        }
        if($cliente->locacao_firewall !== $request->locacao_firewall){
          $cliente->locacao_firewall = null;
        }
        if($cliente->modem !== $request->modem){
          $cliente->modem = null;
        }

        $cliente->id_status_contrato = $request->input('select_status_contrato');;
        $update = $cliente->update($request->all());

        if($update){
            return redirect()->route('app.cliente.index', ['aviso' => 1,'pagina'=>'cliente']);
        } else{
            return redirect()->route('app.cliente.index', ['aviso' => 2,'pagina'=>'cliente']);
        }
        
    }

    public function deletar($id_cliente){
        // dd($usuario);
        // echo $id_usuario;
        Cliente::find($id_cliente)->delete();
        return redirect()->route('app.cliente.index', ['aviso' => 3,'pagina'=>'cliente']);
    }
}