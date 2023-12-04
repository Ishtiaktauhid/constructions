<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor_material extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function material(){
        return $this->belongsTo(Material::class);
    }
}
