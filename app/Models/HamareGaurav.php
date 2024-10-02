<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HamareGaurav extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
		'tagline',
        'description',
        'image',
        'state_id',
        'city_id',
		'status',
		'posted_by',
        'created_at',
        'updated_at'
    ];
}
