<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'level',
        'parent_id',
        'is_active'
    ];

    public function myChildren(){
        return $this->hasMany(get_class($this), 'parent_id');
    }

    public function myParent(){
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function plats(){
        return $this->hasMany(Plat::class);
    }
}
