<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'ordem_de_servicos';
    protected $fillable = [
        'name',
        'endereco',
        'telefone',
    ];
}
