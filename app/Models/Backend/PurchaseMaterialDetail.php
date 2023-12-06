<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseMaterialDetail extends Model
{
    use HasFactory;

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

    public function purchaseMaterial()
    {
        return $this->belongsTo(PurchaseMaterial::class, 'purchase_material_id', 'id');
    }

}
