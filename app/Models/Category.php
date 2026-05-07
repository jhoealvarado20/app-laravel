<?php
/* namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Category extends Model
{
    //
    public function products() {
        return $this->hasMany(Producto::class);
    }
} */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Opcional pero recomendado

class Category extends Model
{
    use HasFactory;

    // Esto permite que Laravel guarde estos campos automáticamente
    protected $fillable = ['nombre', 'slug', 'descripcion'];

    /**
     * Relación: Una categoría tiene muchos productos.
     */
    public function products() 
    {
        return $this->hasMany(Producto::class);
    }
}