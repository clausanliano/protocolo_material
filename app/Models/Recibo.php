<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $table = 'recibos';

    protected $fillable = ['entregador_id', 'recebedor_id', 'observacao'];

    public function entregador()
    {
        return $this->belongsTo(User::class, 'entregador_id', 'id');
    }

    public function recebedor()
    {
        return $this->belongsTo(User::class, 'recebedor_id', 'id');
    }

    public function itens()
    {
        return $this->hasMany(Item::class, 'recibo_id', 'id');
    }

}
