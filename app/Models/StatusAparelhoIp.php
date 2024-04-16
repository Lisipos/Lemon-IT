<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StatusAparelhoIp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'status_aparelho_ip';
    protected $fillable = [
        'status_aparelho_ip',
    ];

    protected $primaryKey = 'id_status_aparelho_ip';
}
