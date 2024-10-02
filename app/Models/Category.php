<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;

    use HasFactory;
    public function categories()
    {
        // return $this->hasMany('App\Category','parent_id');
        return $this->hasMany(Category::class,'parent_id');
    }

    public function childrenCategories()
    {

        return $this->hasMany(Category::class,'parent_id','id')->with('categories');
    }

    public function knowledges(){
        return $this->hasMany(Knowledge::class,'sub_sub_menu_id','id')->orderBy('id', 'desc');
    }

    public function getSubCatKnowleadges(){
        return $this->hasMany(Knowledge::class,'sub_menu_id','id')->orderBy('id', 'desc');
    }
    

    protected $fillable = [
        'parent_id',
        'name',
        'url',
        'description',
        'status'

    ];
}
