<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    use HasFactory;
    protected $fillable = [
        "cat_id",
        "name",
        "image",
        "status"
    ];


    public function catName(){
        return $this->belongsTo(CategoryModel::class,'cat_id');
    }
}
