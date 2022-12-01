<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materiais';

    protected $fillable = ['serial', 'tombo', 'observacao', 'modelo_id'];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo_id', 'id');
    }


}
