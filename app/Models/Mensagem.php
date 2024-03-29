<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagens';

    protected $fillable = [
        'contato_id',
        'descricao'
    ];

    public $timestamps = false;

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}
