<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    public $timestamps = true;
    use HasFactory;

    protected $fillable = [
        'workshop_name',
        'workshop_type',
        'workshop_venue',
        'date',
        'description',
        'created_at',
        'updated_at',
    ];
}
