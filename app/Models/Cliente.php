<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cliente';
    
    protected $fillable = [
        'id_cliente',
        'nome_cliente',
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'cpf',
        'inscricao_estatual',
        'inscricao_municipal',
        'email_principal',
        'logradouro',
        'cep',
        'numero',
        'complemento',
        'telefone_principal',
        'responsavel',
        'telefone_responsavel',
        'email_responsavel',
        'site',
        'url_contrato',
        'id_status_contrato',
        'url_proposta',
        'observacao',
        'helpdesk',
        'link_internet',
        'voip',
        'pabx_analogico',
        'cftv',
        'firewall',
        'computador',
        'aparelho_ip',
        'impressora',
        'pabx',
        'dvr',
        'locacao_firewall',
        'modem',
    ];

    protected $primaryKey = 'id_cliente';
}
