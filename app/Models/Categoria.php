<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome'];

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }
}