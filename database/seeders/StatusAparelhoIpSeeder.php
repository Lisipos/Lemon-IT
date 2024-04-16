<?php

namespace Database\Seeders;

use App\Models\StatusAparelhoIp;
use Illuminate\Database\Seeder;

class StatusAparelhoIpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        StatusAparelhoIp::create([
            'status_aparelho_ip'=>'Locado',
        ]);
        StatusAparelhoIp::create([
            'status_aparelho_ip'=>'Vendido',
        ]);
        StatusAparelhoIp::create([
            'status_aparelho_ip'=>'Estoque',
        ]);
        StatusAparelhoIp::create([
            'status_aparelho_ip'=>'Problema',
        ]);
        StatusAparelhoIp::create([
            'status_aparelho_ip'=>'Perdido',
        ]);
        
    }
}
