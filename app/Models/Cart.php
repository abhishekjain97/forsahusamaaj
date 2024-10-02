<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'product_id',
        'user_id',
        'product_qty',
        'product_size'
    ];


   
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
    
    public function products()
    {
        return $this->hasMany(Product::class,'id');
    }
}
