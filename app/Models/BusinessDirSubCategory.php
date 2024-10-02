<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDirSubCategory extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(BusinessDirCategory::class, 'category_id');
    }
}
