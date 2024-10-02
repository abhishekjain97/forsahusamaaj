<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MandirDharamshala extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
		'tagline',
		'location',
        'description',
        'image',
        'state_id',
        'city_id',
		'status',
        'sanghanthantype',
        'contact_person_name',
        'mobile_no',
        'email',
        'website',
		'posted_by',
        'created_at',
        'updated_at'
    ];
}