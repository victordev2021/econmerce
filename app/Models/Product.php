<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    const BORRADOR = 1;
    const PUBLICADO = 2;
    // accesores
    public function getStockAttribute()
    {
        if ($this->subcategory->size) {
            return ColorSize::whereHas('size.product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } elseif ($this->subcategory->color) {
            return ColorProduct::whereHas('product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } else {
            return $this->quantity;
        }

        return 'Prueba!!!';
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // *********** RELACIONES ELOQUENT **************
    // relación uno a múchos
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
    // relación uno a múchos inversa
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    // relación múchos a múchos
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }
    // relación uno a múchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
