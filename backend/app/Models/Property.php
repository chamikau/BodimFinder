<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $primaryKey = 'property_id';

    protected $fillable = [
        'owner_id',
        'property_type',
        'title',
        'description',
        'address',
        'district',
        'city',
        'latitude',
        'longitude',
        'allowed_gender',
        'total_rooms',
        'available_rooms',
        'monthly_rent',
        'key_money',
        'status',
        'approval_status'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function amenities()
    {
        return $this->hasOne(PropertyAmenity::class, 'property_id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'property_id');
    }
}