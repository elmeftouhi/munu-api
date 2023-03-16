<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQr extends Model
{
    use HasFactory;
    protected $fillable = ['qr', 'user_id'];

    public function user(){
        $this->belongsTo(User::class);
    }
}
