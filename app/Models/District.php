<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // relations
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
