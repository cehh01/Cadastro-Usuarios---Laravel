<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'telefone',
        'email',
        'rua',
        'num_endereco',
        'bairro',
        'cidade',
        'cep'
    ];
}
