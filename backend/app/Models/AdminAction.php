<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAction extends Model
{
    protected $primaryKey = 'action_id';

    protected $fillable = [
        'admin_id',
        'action_type',
        'target_id',
        'remarks'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}