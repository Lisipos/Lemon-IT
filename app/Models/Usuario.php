<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'id_usuario',
        'nome_usuario',
        'email_usuario',
        'senha_usuario',
        'id_autorizacao',
        'url_ass',
        'url_img_perfil',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = 'id_usuario';
}
