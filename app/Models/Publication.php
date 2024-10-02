<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'title',
		'company_name',
        'date',
        'description',
        'image',
        'price',
		'status',
        'created_at',
        'updated_at'
    ];
}
