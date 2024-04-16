<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fonte extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'voltagem',
        'amperagem',
        'plug',
    ];

    protected $primaryKey = 'id_fonte';
}
