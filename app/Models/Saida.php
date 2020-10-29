<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @todo Criar observer que faça desconto na tabela de saída com base na quantidade expedida aqui. Pode vir a ser um desafio descontar primeiro do registro mais antigo e cado ainda falte, descontar do registros posterior mais antigo
 */
class Saida extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produto',
        'id_venda',
        'qtde',
        'preco_momento',
        'margem_lucro_momento',
        'desconto',
    ];
}
