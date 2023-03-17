<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'title',
        'image',
        'level',
        'is_active',
        'price',
        'description'
    ];

    public function category(){
       return $this->belongsTo(Category::class);
    }
}
