<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'countryCode',
        'name',
    ];
}
