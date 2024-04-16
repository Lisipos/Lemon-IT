<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizacao extends Model
{
    use HasFactory;

    protected $table = 'autorizacao';
    protected $fillable = [
        'autorizacao',
    ];
}
