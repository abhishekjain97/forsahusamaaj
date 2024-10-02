<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public $timestamps = true;
    use HasFactory;

    protected $fillable = [
        'name',
        'father_name',
        'email',
        'phone',
        'donation',
        'donation_type',
        'address',
        'created_at',
        'updated_at',
    ];
}
