<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    protected $casts = [
        'images'    => 'array',
        'published' => 'boolean',
    ];
}
