<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDirectory extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(BusinessDirCategory::class, 'category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(BusinessDirSubCategory::class, 'sub_category_id');
    }

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
        'category_id', 
        'sub_category_id', 
        'business_name', 
        'director_name', 
        'visiting_card', 
        'document', 
        'work', 
        'person_name', 
        'mobile', 
        'email', 
        'address', 
        'pincode', 
        'country_id', 
        'state_id', 
        'city_id', 
        'website_link', 
        'any_offer', 
        'description', 
        'status', 
        'created_at', 
        'updated_at',
    ];
}
