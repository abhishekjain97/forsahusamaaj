<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicUserAddresses extends Model
{
    public $timestamps = true;

    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'mobile',
        'pincode',
        'locality',
        'address',
        'city',
        'state',
        'landmark',
        'altmobile',
        'created_at',
        'updated_at'
    ];
}
