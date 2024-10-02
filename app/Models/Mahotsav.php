<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahotsav extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'title',
		'address',
        'date',
        'description',
        'image',
		'status',
        'created_at',
        'updated_at'
    ];
}
