<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // *********** RELACIONES ELOQUENT **************
    // relación uno a múchos inversa
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // relación múchos a múchos
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
