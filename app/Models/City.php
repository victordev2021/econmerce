<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // relations
    public function districts()
    {
        return $this->hasMany(Disctrict::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
