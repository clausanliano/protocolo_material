<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $table = 'modelos';

    protected $fillable = ['nome', 'observacao', 'tipo_material_id', 'fabricante_id'];


    public function tipo_material()
    {
        return $this->belongsTo(TipoMaterial::class, 'tipo_material_id', 'id');
    }

    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class, 'fabricante_id', 'id');
    }


}
