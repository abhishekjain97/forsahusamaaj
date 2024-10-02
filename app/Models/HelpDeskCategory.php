<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpDeskCategory extends Model
{
    use HasFactory;

    public function childrenCategories()
    {

        return $this->hasMany(HelpDeskCategory::class,'parent_id','id');
    }

    protected $fillable = [
        'parent_id',
        'name',
        'url',
        'description',
        'status'

    ];
}
