<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karma extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
        'description',
        'image',
        'created_at',
        'updated_at'
    ];
}
