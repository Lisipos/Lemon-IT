<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModeloAparelhoIp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'modelo_aparelho_ip';
    protected $fillable = [
        'modelo_aparelho_ip',
    ];

    protected $primaryKey = 'id_modelo_aparelho_ip';
}
