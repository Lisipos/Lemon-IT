<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusContrato;

class StatusContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        StatusContrato::create([
            'status_contrato'=>'Aberto',
        ]);
        StatusContrato::create([
            'status_contrato'=>'Encerrado',
        ]);
        StatusContrato::create([
            'status_contrato'=>'Cancelado',
        ]);
        StatusContrato::create([
            'status_contrato'=>'Pendente',
        ]);
    }
}
