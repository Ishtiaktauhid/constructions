<?php

namespace App\Models\Backend;

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

    public function project_material(){
        return $this->hasMany(Project_material::class);
    }
}
