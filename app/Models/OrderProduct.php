<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = true;
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'product_qty',
        'product_name',
        'product_size',
        'product_price',
        'total_amount',
        'created_at',
        'updated_at'
    ];

    
}
