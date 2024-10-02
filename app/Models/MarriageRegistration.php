<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarriageRegistration extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'create_profile_for',
        'gender',
        'user_name',
        'caste',
        'dob',
        'birth_time',
        'birth_place',
        'marital_status',
        'height',
        'complexion',
        'manglik',
        'profile_image',
        'education',
        'occupation',
        'annual_income',
        'pincode',
        'gotra',
        'city',
        'state',
        'country',
        'contact_address',
        'mobile',
        'email',
        'other_phone_no',
        'phone_no_relation',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'brothers',
        'married_brothers',
        'un_married_brothers',
        'sisters',
        'married_sisters',
        'un_married_sisters',
    ];
}

