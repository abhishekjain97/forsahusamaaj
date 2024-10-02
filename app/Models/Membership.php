<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'type',
        'name',
		'price',
        'description',
        'duration',
        'duration_type',
        'created_at',
        'updated_at'
    ];
}
