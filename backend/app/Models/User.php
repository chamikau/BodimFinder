<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function properties()
    {
        return $this->hasMany(Property::class, 'owner_id');
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

    public function documents()
    {
        return $this->hasMany(VerificationDocument::class, 'user_id');
    }

    public function adminActions()
    {
        return $this->hasMany(AdminAction::class, 'admin_id');
    }
}