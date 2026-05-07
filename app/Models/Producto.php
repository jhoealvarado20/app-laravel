<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
