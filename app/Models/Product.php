<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = true;

    protected $casts = [
        'pactualprice' => 'float',
        'pofferprice' => 'float'
    ];

    protected $fillable = [
        'pname',
        'pcategory',
        'subcategory',
        'pcolor',
        'psize',
        'pfabric',
        'pactualprice',
        'pofferprice',
        'pdiscount',
        'pdescription',
        'pquantity',
        'pimages',
        'created_at',
        'updated_at'
    ];
   
}