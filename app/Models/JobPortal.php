<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPortal extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'title',
		'amount',
		'company_name',
		'close_date',
		'delivery_time',
		'date',
        'description',
        'skill',
		'requirements',
		'image',
        'state_id',
        'city_id',
		'email',
		'phone',
		'status',
        'created_at',
        'updated_at'
    ];
}
