<?php

namespace LeoRalph\ModelHistory\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $casts = [
        'previous' => 'array',
        'changes' => 'array',
        'performed_at' => 'datetime',
    ];

    public $timestamps = false;
}