<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function floors(){
        return $this->belongsTo(Floor::class);
    }
}
