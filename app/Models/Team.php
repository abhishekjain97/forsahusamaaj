<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function subCat(){
        return $this->hasMany(Category::class,'id','category_id')->with('categories');
    }

    protected $fillable = [
        'name',
        'designation',
		'category_id',
		'state_id',
		'city_id',
		'location',
		'description',
        'image',
        'fb_link',
        'key_person',
        'created_at',
        'updated_at'
    ];
}
