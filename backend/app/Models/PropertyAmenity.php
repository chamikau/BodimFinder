<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyAmenity extends Model
{
    protected $primaryKey = 'amenity_id';

    protected $fillable = [
        'property_id',
        'parking',
        'kitchen',
        'attached_bathroom',
        'hot_water',
        'wifi',
        'security'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}