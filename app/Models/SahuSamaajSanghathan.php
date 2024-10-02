<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SahuSamaajSanghathan extends Model
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
		'posted_by',
		'sanghanthantype',
        'president_name',
        'mobile_no',
		'whatsapp_no',
		'membership_type',
		'logo',
        'created_at',
        'updated_at'
    ];
}
