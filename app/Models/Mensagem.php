<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagens';

    protected $fillable = [
        'descricao'
    ];

    protected $primaryKey = 'contato_id';

    public $timestamps = false;

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}
