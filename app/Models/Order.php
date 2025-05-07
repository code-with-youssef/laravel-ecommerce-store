<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
      
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'order_id',
        'user_id',
        'total_amount',
        'payment_method',
        'city',
        'address',
        'phone',
        'email',
        'first_name',
        'last_name',
    ];
    protected $casts = [
        'content' => 'array',
    ];
}
