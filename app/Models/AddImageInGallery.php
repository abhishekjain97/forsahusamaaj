<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddImageInGallery extends Model
{
    use HasFactory;

    public function getImageCat(){
        return $this->hasMany(Gallery::class,'id','gallery_id');
    }

    
}
