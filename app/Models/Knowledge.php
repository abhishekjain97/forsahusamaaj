<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    use HasFactory;
    protected $table = 'knowledges';
    public $timestamps = true;


    public function subSubCat(){
        return $this->hasMany(Category::class,'id','sub_sub_menu_id')->with('categories');
    }

    public function subCat(){
        return $this->hasMany(Category::class,'id','sub_menu_id')->with('categories');
    }

    
    
    protected $fillable = [
        'home_menu_id',
        'sub_menu_id',
        'sub_sub_menu_id',
        'title',
        'slug',
        'country',
        'state',
        'business_cate',
        'is_featured',
        'publish_date',
        'short_desc',
        'long_desc',
        'thubmnail',
        'tags',
        'meta_title',
        'meta_keyword',
        'meta_desc',
        'views_count',
        'author',
        'created_at',
        'updated_at'
    ];

}
