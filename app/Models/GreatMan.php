<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreatMan extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'menu_name',
        'description',
        'created_at',
        'updated_at'
    ];
}
