<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'precio',
        'id_categoria'
    ];

    public function categoria(){
        return $this->belogsTo('App\Categoria');
    }
}
