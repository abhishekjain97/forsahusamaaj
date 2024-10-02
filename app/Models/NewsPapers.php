<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPapers extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'image',
        'created_at',
        'updated_at'
    ];
}
