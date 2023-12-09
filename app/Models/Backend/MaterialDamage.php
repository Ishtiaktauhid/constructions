<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialDamage extends Model
{
    use HasFactory;
    
    public function floor(){
        return $this->belongsTo(Floor::class);
    }

    public function flat(){
        return $this->belongsTo(Flat::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }
}
