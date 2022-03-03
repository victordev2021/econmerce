<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    const BORRADOR = 1;
    const PUBLICADO = 2;
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
        return $this->belongsToMany(Color::class);
    }
    // relación uno a múchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
