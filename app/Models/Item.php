<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'itens';

    protected $fillable = ['material_id', 'recibo_id', 'observacao'];

    public function recibo()
    {
        return $this->belongsTo(Recibo::class, 'recibo_id', 'id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

}
