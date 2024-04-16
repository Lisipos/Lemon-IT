<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ModeloAparelhoIp;
use App\Models\Fonte;
use App\Models\StatusAparelhoIp;
use App\Models\AparelhoIp;
use Illuminate\Http\Request;

class AparelhoIpController extends Controller
{
  ///

  public function teste(Request $request)
  {
    echo'Teste';
  }

  public function cadastro(Request $request)
  {
    // $cliente = new AparelhoIp();
    $aviso = '';
    if ($request->get('aviso') == 1) {
      $aviso = '<div class="message">
            <div class="alert alert-success">
              <a href="" class="close" data-dismiss="alert">&times</a>
              Aparelho IP cadastrado com sucesso.
            </div>
          </div>';
    }

    $modelo_aparelho_ip = ModeloAparelhoIp::all();
    $status_aparelho_ip = StatusAparelhoIp::all();
    $cliente = Cliente::all();
    $fonte = Fonte::all();


    return view('site.aparelhoIp.cadastro', ['titulo' => 'Cadastro de Aparelho Ip', 'clientes' => $cliente, 'status_aparelho_ips' => $status_aparelho_ip, 'fontes' => $fonte, 'modelo_aparelho_ips' => $modelo_aparelho_ip, 'aviso' => $aviso, 'pagina' => 'aparelho']);
   
  }

  public function store(Request $request)
  {

    $regras = [
      'select_modelo_aparelho_ip' =>  'exists:modelo_aparelho_ip,id_modelo_aparelho_ip|required',
      // 'serial_number' =>  'unique:aparelho_ip,serial_number',
      'mac_address' =>  'unique:aparelho_ip,mac_address',
      'bem_patrimonial' =>  'unique:aparelho_ip,bem_patrimonial',
      // 'bem_patrimonial_base' =>  'unique:aparelho_ip,bem_patrimonial_base',
      'select_status_aparelho_ip' =>  'exists:status_aparelho_ip,id_status_aparelho_ip|required',
      'select_cliente' =>  'exists:cliente,id_cliente|required',
      // 'imgPerfil' =>  'required',
      'select_fonte' =>  'exists:fontes,id_fonte|required',

    ];


    $feedback = [
      'select_modelo_aparelho_ip.required' => 'O campo Modelo é obrigatório',
      'select_modelo_aparelho_ip.exists' => 'Não é uma opção válida', 
      // 'serial_number.unique' => 'Número de serie já cadastrado',
      'mac_address.unique' => 'MAC já cadastrado',
      'bem_patrimonial.unique' => 'Patrimonio já cadastrado',
      // 'bem_patrimonial_base.unique' => 'Patrimonio já cadastrado',
      'select_status_aparelho_ip.required' => 'O campo Status é obrigatório',
      'select_status_aparelho_ip.exists' => 'Não é uma opção válida',
      'select_cliente.required' => 'O campo Cliente é obrigatório',
      'select_cliente.exists' => 'Não é uma opção válida',
      'select_fonte.required' => 'O campo Fonte é obrigatório',
      'select_fonte.exists' => 'Não é uma opção válida',


    ];
    // dd($request);
    $request->validate($regras, $feedback);
    
    $aparelho_ip = new AparelhoIp();

    $aparelho_ip->id_modelo_aparelho_ip = $request->input('select_modelo_aparelho_ip');
    $aparelho_ip->serial_number = $request->input('serial_number');
    $aparelho_ip->mac_address = $request->input('mac_address');
    $aparelho_ip->bem_patrimonial = $request->input('bem_patrimonial');
    $aparelho_ip->bem_patrimonial_base = $request->input('bem_patrimonial_base');
    $aparelho_ip->id_status_aparelho_ip = $request->input('select_status_aparelho_ip');
    $aparelho_ip->id_cliente = $request->input('select_cliente');
    $aparelho_ip->cadastrado_por = $_SESSION['id_usuario'];
    $aparelho_ip->url_foto = $request->input('url_foto');
    $aparelho_ip->id_fonte = $request->input('select_fonte');
    $aparelho_ip->base = $request->input('base');
    $aparelho_ip->monofone = $request->input('monofone');
    $aparelho_ip->espiral = $request->input('espiral');
    $aparelho_ip->observacao = $request->input('observacao');
    $aparelho_ip->alterado_por = $_SESSION['id_usuario'];
    $aparelho_ip->id_ultimo_cliente = $request->input('select_cliente');
    // $aparelho_ip->data_ultima_alteracao = $request->input('data_ultima_alteracao');

    $aparelho_ip->save();
    return redirect()->route('app.aparelhoIp.cadastro', ['aviso' => 1, 'pagina' => 'aparelho']);
  }


  public function listar(Request $request)
  {
    $aviso = '';
    if ($request->get('aviso') == 1) {
      $aviso = '<div class="message">
            <div class="alert alert-success">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Aparelho IP alterado com sucesso.
            </div>
          </div>';
    }
    if ($request->get('aviso') == 2) {
      $aviso = '<div class="message">
            <div class="alert alert-warning">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Aparelho IP não alterado.
            </div>
          </div>';
    }
    if ($request->get('aviso') == 3) {
      $aviso = '<div class="message">
            <div class="alert alert-danger">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Aparelho IP deletado com sucesso.
            </div>
          </div>';
    }

    $aparelhoIp = new AparelhoIp();

    if ($request->select_cliente == null) {
      $aparelhosIp = AparelhoIp::paginate(10);
      $totalAparelhosIp = AparelhoIp::count();
    } else {
      $aparelhosIp = $aparelhoIp->where('id_cliente', $request->select_cliente)->paginate(10);
    }
    $modelo_aparelho_ips = ModeloAparelhoIp::all();
    $status_aparelho_ips = StatusAparelhoIp::all();
    $clientes = Cliente::all();
    $fontes = Fonte::all();
    $totalAparelhosIp = AparelhoIp::count();
    return view('site.aparelhoIp.index', ['titulo' => 'Aparelho Ip', 'aparelhosIp' => $aparelhosIp, 'clientes' => $clientes, 'status_aparelho_ips' => $status_aparelho_ips, 'fontes' => $fontes, 'modelo_aparelho_ips' => $modelo_aparelho_ips, 'aviso' => $aviso, 'total_aparelhos_ip'=>$totalAparelhosIp,'pagina' => 'aparelho']);
  }


  public function edit($id_aparelho_ip)
  {

    $aparelho_ip = AparelhoIp::find($id_aparelho_ip);

    $modelo_aparelho_ip = ModeloAparelhoIp::all();
    $status_aparelho_ip = StatusAparelhoIp::all();
    $cliente = Cliente::all();
    $fonte = Fonte::all();

    return view('site.aparelhoIp.alterar', ['titulo' => 'Alterar Usuário', 'aparelho_ip' => $aparelho_ip, 'clientes' => $cliente, 'status_aparelho_ips' => $status_aparelho_ip, 'fontes' => $fonte, 'modelo_aparelho_ips' => $modelo_aparelho_ip, 'pagina' => 'aparelho']);
  }

  public function update(Request $request)
  {
    // dd($request);
    $aparelho_ip = AparelhoIp::find($request->id_aparelho_ip);

    if ($aparelho_ip->base !== $request->base) {
      $aparelho_ip->base = null;
    }

    if ($aparelho_ip->monofone !== $request->monofone) {
      $aparelho_ip->monofone = null;
    }

    if ($aparelho_ip->espiral !== $request->espiral) {
      $aparelho_ip->espiral = null;
    }


    $aparelho_ip->id_ultimo_cliente = $aparelho_ip->id_cliente;
    $aparelho_ip->id_modelo_aparelho_ip = $request->input('select_modelo_aparelho_ip');
    $aparelho_ip->id_status_aparelho_ip = $request->input('select_status_aparelho_ip');
    $aparelho_ip->id_cliente = $request->input('select_cliente');
    $aparelho_ip->id_fonte = $request->input('select_fonte');
    $aparelho_ip->alterado_por = $request->$_SESSION['imgPerfil'];
    // $aparelho_ip->data_ultima_alteracao = now();
    $update = $aparelho_ip->update($request->all());

    if ($update) {
      return redirect()->route('app.aparelhoIp.index', ['aviso' => 1, 'pagina' => 'aparelho']);
    } else {
      return redirect()->route('app.aparelhoIp.index', ['aviso' => 2, 'pagina' => 'aparelho']);
    }
  }

  public function deletar($id_aparelho_ip)
  {
    AparelhoIp::find($id_aparelho_ip)->delete();
    return redirect()->route('app.aparelhoIp.index', ['aviso' => 3, 'pagina' => 'aparelho']);
  }
}
