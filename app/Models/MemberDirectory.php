<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDirectory extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Countrie::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(Citie::class, 'city_id');
    }

    public $timestamps = true;
    protected $fillable = [
        'user_id', 
        'name', 
        'father_name', 
        'mobile', 
        'email_id', 
        'facebook', 
        'instagram', 
        'youtube', 
        'country_id', 
        'state_id', 
        'city_id', 
        'address', 
        'highest_education', 
        'dob', 
        'blood_group', 
        'marriage_anniversary', 
        'profile_photo', 
        'current_address', 
        'permanent_address', 
        'occupation_type', 
        'profession', 
        'upload_photo', 
        'upload_supporting_doc',
        'description',
        'created_at',
        'updated_at',
    ];
}
