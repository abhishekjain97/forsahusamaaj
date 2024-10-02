<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpDeskParamarsh extends Model
{
    use HasFactory;
    public function childrenCategories()
    {

        return $this->hasMany(HelpDeskParamarsh::class,'parent_id','id');
    }
    protected $fillable = [
        'paramarsh_id',
        'parent_id',
        'ask_by',
        'question',
        'ans_by',
        'answer',
        'created_at',
        'updated_at',

    ];
}
