<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusContrato extends Model
{
    use HasFactory;
    protected $table = 'status_contrato';
    protected $fillable = [
        'status_contrato',
    ];
}
