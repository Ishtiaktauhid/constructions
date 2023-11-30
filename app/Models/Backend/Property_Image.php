<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_Image extends Model
{
    use HasFactory;
    
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
