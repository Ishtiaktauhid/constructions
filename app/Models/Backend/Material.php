<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public function project_material(){
        return $this->hasMany(Project_material::class);
    }
    public function material(){
        return $this->belongsTo(Material::class);
    }
}
