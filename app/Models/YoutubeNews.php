<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoutubeNews extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'title',
        'video_link',
        'video_image',
        'created_at',
        'updated_at'
    ];
}
