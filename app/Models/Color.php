<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // *********** RELACIONES ELOQUENT **************
    // relación múchos a múchos
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    // relación múchos a múchos
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
