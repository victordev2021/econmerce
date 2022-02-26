<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // *********** RELACIONES ELOQUENT **************
    // relación uno a múchos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // relación múchos a múchos
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
