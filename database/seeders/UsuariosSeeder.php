<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //
        // $usuario = new Usuario();
        // $usuario ->nome_usuario = 'Felipe Campos Uglar';
        // $usuario ->email_usuario = 'felipe.campos@lemonits.com.br';
        // $usuario ->senha_usuario = 'L3m0nITs@21!@#';
        // $usuario ->id_autorizacao = '';
        // $usuario->save();

        // Usuario::create([
        //     'nome_usuario'=>'Felipe Campos Uglar',
        //     'email_usuario'=>'felipe.campos@lemonits.com.br',
        //     'senha_usuario'=>'L3m0nITs@21!@#',
        //     'id_autorizacao'=>'1',
        //     'url_ass'=>'assFelipe.PNG',
        //     'url_img_perfil'=>'felipe_campos.jpg'
        // ]);

        Usuario::create([
            'nome_usuario'=>'Maria Eduarda',
            'email_usuario'=>'maria.eduarda@lemonits.com.br',
            'senha_usuario'=>'12345',
            'id_autorizacao'=>'2',
            'url_ass'=>'assMariaEduarda.PNG',
            'url_img_perfil'=>'maria_eduarda.jpg'
        ]);
    }
}
