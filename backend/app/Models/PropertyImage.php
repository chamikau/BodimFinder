<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $primaryKey = 'image_id';

    protected $fillable = [
        'property_id',
        'image_url',
        'is_primary'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}