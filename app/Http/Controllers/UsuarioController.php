<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Models\Autorizacao;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    //
    //######## Middleware direto no construtor #######
    // public function __construct(){
    //     $this->middleware(LogAcessoMiddleware::class);
    // }
    //################################################


    // Login
    public function login(Request $request)
    {

        $erro = '';
        $aviso = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existem';
        }
        if ($request->get('erro') == 2) {
            $erro = 'Login necessário para acessar a párina';
        }
        if ($request->get('aviso') == 1) {
            $aviso = 'Logout realizado';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro, 'aviso' => $aviso ,'pagina'=>'usuario']);
    }

    // Autenticação
    public function autenticar(Request $request)
    {

        $regras = [
            'email' =>  'email|required',
            'senha' => 'required'
        ];


        $feedback = [
            'usuario.email' => 'O campo Email deve ser um e-mail',
            'usuario.required' => 'O campo Email é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'

        ];

        $request->validate($regras, $feedback);

        $email = $request->get('email');
        $senha = $request->get('senha');

        $user = new Usuario();

        $usuario = $user->where('email_usuario', $email)->where('senha_usuario', $senha)->get()->first();

        if (isset($usuario->nome_usuario)) {
            session_start();
            $_SESSION['nome'] = $usuario->nome_usuario;
            $_SESSION['email'] = $usuario->email_usuario;
            $_SESSION['imgPerfil'] = $usuario->url_img_perfil;
            $_SESSION['id_usuario'] = $usuario->id_usuario;

            // Admin
            if($usuario->id_autorizacao == 1){
                $_SESSION['nav_estoque'] = 'sim';

                $_SESSION['nav_cadastrar'] = 'sim';
                $_SESSION['nav_cadastrar_aparelhoIp'] = 'sim';
                $_SESSION['nav_cadastrar_modeloAparelhoIp'] = 'sim';
                
                $_SESSION['nav_clientes'] = 'sim';
                $_SESSION['nav_clientes_listar'] = 'sim';
                $_SESSION['nav_clientes_cadastrar'] = 'sim';

                $_SESSION['nav_usuario'] = 'sim';
            }
            // Estagiario
            else if($usuario->id_autorizacao == 2){
                $_SESSION['nav_estoque'] = 'sim';

                $_SESSION['nav_cadastrar'] = 'sim';
                $_SESSION['nav_cadastrar_aparelhoIp'] = 'sim';
                $_SESSION['nav_cadastrar_modeloAparelhoIp'] = 'sim';
                
                $_SESSION['nav_clientes'] = 'sim';
                $_SESSION['nav_clientes_listar'] = 'sim';
                $_SESSION['nav_clientes_cadastrar'] = 'nao';
                
                $_SESSION['nav_usuario'] = 'nao';
            }
            // Suporte
            else if($usuario->id_autorizacao == 5){
                $_SESSION['nav_estoque'] = 'sim';

                $_SESSION['nav_cadastrar'] = 'sim';
                $_SESSION['nav_cadastrar_aparelhoIp'] = 'sim';
                $_SESSION['nav_cadastrar_modeloAparelhoIp'] = 'sim';

                $_SESSION['nav_clientes'] = 'sim';
                $_SESSION['nav_clientes_listar'] = 'sim';
                $_SESSION['nav_clientes_cadastrar'] = 'nao';
                
                $_SESSION['nav_usuario'] = 'nao';
            }
            // Comercial
            else if($usuario->id_autorizacao == 6){
                $_SESSION['nav_estoque'] = 'sim';
                
                $_SESSION['nav_cadastrar'] = 'nao';
                $_SESSION['nav_cadastrar_aparelhoIp'] = 'nao';
                $_SESSION['nav_cadastrar_modeloAparelhoIp'] = 'nao';

                $_SESSION['nav_clientes'] = 'sim';
                $_SESSION['nav_clientes_listar'] = 'sim';
                $_SESSION['nav_clientes_cadastrar'] = 'sim';
                
                $_SESSION['nav_usuario'] = 'nao';
            }
            // Diretor
            else if($usuario->id_autorizacao == 7){
                $_SESSION['nav_estoque'] = 'sim';
                
                $_SESSION['nav_cadastrar'] = 'sim';
                $_SESSION['nav_cadastrar_aparelhoIp'] = 'sim';
                $_SESSION['nav_cadastrar_modeloAparelhoIp'] = 'sim';

                $_SESSION['nav_clientes'] = 'sim';
                $_SESSION['nav_clientes_listar'] = 'sim';
                $_SESSION['nav_clientes_cadastrar'] = 'sim';
                
                $_SESSION['nav_usuario'] = 'sim';
            }        

            return redirect()->route('app.index');
        } else {
            return redirect()->route('site.login', ['erro' => 1,'pagina'=>'usuario']);
        }
    }

    // Logout
    public function logout()
    {
        session_destroy();
        return redirect()->route('site.login', ['aviso' => 1,'pagina'=>'usuario']);
    }


    public function cadastro(Request $request)
    {

        $erro = '';
        $aviso = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existem';
        }
        if ($request->get('erro') == 2) {
            $erro = 'Login necessário para acessar a párina';
        }
        if ($request->get('aviso') == 1) {
            $aviso = '<div class="message">
            <div class="alert alert-success">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Usuário cadastrado com sucesso.
            </div>
          </div>';
        }

        $autorizacoes = Autorizacao::all();


        return view('site.usuarios.cadastro', ['titulo' => 'Cadastro de Usuario', 'autorizacoes' => $autorizacoes, 'aviso' => $aviso,'pagina'=>'usuario']);
    }

    public function store(Request $request)
    {

        $regras = [
            'nome_usuario' =>  'required',
            'email_usuario' =>  'unique:usuarios,email_usuario|email|required',
            'senha_usuario' =>  'required',
            'id_autorizacao' =>  'exists:autorizacao,id_autorizacao|required'
        ];


        $feedback = [
            'nome_usuario.required' => 'O campo Nome é obrigatório',
            'email_usuario.email' => 'O campo Email deve ser um e-mail',
            'email_usuario.required' => 'O campo Email é obrigatório',
            'email_usuario.unique' => 'Email já registrado',
            'senha_usuario.required' => 'O campo senha é obrigatório',
            'id_autorizacao.required' => 'O campo permissão é obrigatório',
            'id_autorizacao.exists' => 'Não é uma opção válida'

        ];

        $request->validate($regras, $feedback);

        $user = new Usuario();

        $user->nome_usuario = $request->input('nome_usuario');
        $user->email_usuario = $request->input('email_usuario');
        $user->senha_usuario = $request->input('senha_usuario');
        $user->id_autorizacao = $request->input('id_autorizacao');
        $user->url_ass = $request->input('url_ass');
        $user->url_img_perfil = $request->input('url_img_perfil');

        $user->save();
        return redirect()->route('app.usuario.cadastro', ['aviso' => 1,'pagina'=>'usuario']);
    }


    public function listar(Request $request){
        $aviso = '';
        if ($request->get('aviso') == 1) {
            $aviso = '<div class="message">
            <div class="alert alert-success">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Usuário alterado com sucesso.
            </div>
          </div>';
        }
        if ($request->get('aviso') == 2) {
            $aviso = '<div class="message">
            <div class="alert alert-warning">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Usuário não alterado.
            </div>
          </div>';
        }
        if ($request->get('aviso') == 3) {
            $aviso = '<div class="message">
            <div class="alert alert-danger">
              <a href=" class="close" data-dismiss="alert">&times</a>
              Usuário deletado com sucesso.
            </div>
          </div>';
        }
        $usuarios = Usuario::paginate(10);
        return view('site.usuarios.index',['titulo' => 'Usuarios','usuarios'=>$usuarios, 'request'=>$request->all(), 'aviso' => $aviso,'pagina'=>'usuario']);
    }


    public function edit($id_usuario){
        
        $usuario = Usuario::find($id_usuario);

        $autorizacoes = Autorizacao::all();

        return view('site.usuarios.alterar', ['titulo' => 'Alterar usuário','usuario'=>$usuario, 'autorizacoes' => $autorizacoes,'pagina'=>'usuario']);
    }

    public function update(Request $request){
        // dd($request);
        $usuario = Usuario::find($request->id_usuario);
        $update = $usuario->update($request->all());

        if($update){
            return redirect()->route('app.usuario.index', ['aviso' => 1,'pagina'=>'usuario']);
        } else{
            return redirect()->route('app.usuario.index', ['aviso' => 2,'pagina'=>'usuario']);
        }
        
    }

    public function deletar($id_usuario){
        // dd($usuario);
        // echo $id_usuario;
        Usuario::find($id_usuario)->delete();
        return redirect()->route('app.usuario.index', ['aviso' => 3,'pagina'=>'usuario']);
    }

}
