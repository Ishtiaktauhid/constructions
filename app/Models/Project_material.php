<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_material extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function material(){
        return $this->belongsTo(Material::class);
    }
}
