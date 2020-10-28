<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produto',
        'id_venda',
        'qtde',
        'preco_entrada_no_momento',
        'preco_saida_no_momento',
    ];
}
