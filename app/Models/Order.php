<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    public $timestamps = true;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_address',
        'mobile',
        'total_amount',
        'payment_method',
        'order_date',
        'delivery_date',
        'order_status',
        'created_at',
        'updated_at'
    ];

    public function orders()
    {
        return $this->hasMany(OrderProduct::class,'order_id');
        
    }
}
