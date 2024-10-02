<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitFromPublic extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'title',
        'category',
        'country',
        'image',
        'doc',
        'created_at',
        'updated_at'
    ];
}
