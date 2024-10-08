<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'title',
        'date',
        'address',
        'image',
        'created_at',
        'updated_at'
    ];

    
}
