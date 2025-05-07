<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    protected $casts = [
        'created_at' => 'datetime',
    ];
    const UPDATED_AT = null;
    use HasFactory;
}
