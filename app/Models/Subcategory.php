<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // *********** RELACIONES ELOQUENT **************
    // relación uno a múchos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // relación uno a múchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
