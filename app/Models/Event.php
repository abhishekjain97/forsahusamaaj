<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'image',
        'address',
		'from_date',
		'to_date',
		'expire_date',
        'description',
        'created_at',
        'updated_at'
    ];

   
}
