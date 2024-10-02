<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpDesk extends Model
{
    use HasFactory;
    
    public function subCat(){
        return $this->hasMany(HelpDeskCategory::class,'id','category');
    }

    public function subSubCat(){
        return $this->hasMany(HelpDeskCategory::class,'id','plan');
    }

    protected $fillable = [
        'category',
        'plan',
        'title',
        'description',
        'images',
        'created_at',
        'updated_at'
    ];
}
