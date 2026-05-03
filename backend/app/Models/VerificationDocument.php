<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationDocument extends Model
{
    protected $primaryKey = 'document_id';

    protected $fillable = [
        'user_id',
        'document_type',
        'document_url',
        'status',
        'reviewed_by',
        'reviewed_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}