<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamousPersonList extends Model
{
    public $timestamps = true;
    use HasFactory; 
    protected $fillable = [
        'name',
		'tagline',
        'dob',
        'death_date',
        'description',
        'image',
        'state_id',
        'city_id',
        'created_at',
        'updated_at'
    ];

    
    public function state(){
        return $this->hasMany(State::class,'id','state_id');
    }

    public function city(){
        return $this->hasMany(Citie::class,'id','city_id');
    }

}
