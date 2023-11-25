<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function land(){
        return $this->belongsTo(Land::class);
    }

    public function property(){
        return $this->hasMany(Property_Image::class);
    }
}
