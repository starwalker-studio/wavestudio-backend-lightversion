<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Model;

class WavestoreBrand extends Model
{
    protected $table = 'wavestore_brand';
    public $timestamps = false; // solo tienes created_at, no updated_at

    protected $fillable = [
        'brand',
    ];

    // public function products()
    // {
    //     return $this->hasMany(WavestoreProduct::class, 'id_brand');
    // }
}
