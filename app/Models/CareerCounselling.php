<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerCounselling extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
        'description',
		'vanue',
        'image',
		'status',
        'created_at',
        'updated_at'
    ];
}
