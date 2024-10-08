<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsBroadCast extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
        'description',
        'image',
        'state_id',
        'city_id',
		'status',
        'created_at',
        'updated_at'
    ];
}
