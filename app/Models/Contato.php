<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contatos';

    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'telefone'
    ];

    public $timestamps = false;

    public function mensagens()
    {
        return $this->hasMany(Mensagem::class);
    }
}
