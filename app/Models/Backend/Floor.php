<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function flats(){
        return $this->hasMany(Flat::class);
    }

    public function materialdamage(){
        return $this->hasMany(MaterialDamage::class);
    }
}
