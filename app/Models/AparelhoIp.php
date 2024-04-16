<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AparelhoIp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'aparelho_ip';
    protected $fillable = [
        'id_aparelho_ip',
        'id_modelo_aparelho_ip',
        'serial_number',
        'mac_address',
        'bem_patrimonial',
        'bem_patrimonial_base',
        'id_status_aparelho_ip',
        'id_cliente',
        'cadastrado_por',
        'url_foto',
        'id_fonte',
        'base',
        'monofone',
        'espiral',
        'observacao',
        'alterado_por',
        'id_ultimo_cliente',
    ];

    protected $primaryKey = 'id_aparelho_ip';
}
