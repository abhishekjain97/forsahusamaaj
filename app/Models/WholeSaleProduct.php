<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WholeSaleProduct extends Model
{
    public $timestamps = true;
    use HasFactory;

    protected $casts = [
        'pprice' => 'float'
        
    ];

    protected $fillable = [
        'pname',
        'pfabric',
        'pprice',
        'pdescription',
        'pimages',
        'created_at',
        'updated_at'
    ];
}
