<?php

namespace LeoRalph\ModelHistory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class History extends Model
{
    protected $casts = [
        'previous' => 'array',
        'changes' => 'array',
        'performed_at' => 'datetime',
    ];

    protected $fillable = [
        'model_type',
        'model_id',
        'event',
        'previous',
        'changes',
    ];

    public $timestamps = false;

    public function causer(): MorphTo
    {
        return $this->morphTo();
    }
}