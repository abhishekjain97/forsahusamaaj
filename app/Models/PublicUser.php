<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicUser extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'otp',
        'insert_image',
        'is_verified',
        'membership_id',
        'membership_start',
        'membership_end',
        'created_at',
        'updated_at'
    ];
}
