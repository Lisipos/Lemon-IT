<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autorizacao;

class AutorizacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $autorizacao = new Autorizacao();

        // $autorizacao->autorizacao =  'admin';
        // $autorizacao->save();


        // Autorizacao::create([
        //     'autorizacao'=>'admin'
        // ]);

        Autorizacao::create([
            'autorizacao'=>'diretor'
        ]);

    }
}
