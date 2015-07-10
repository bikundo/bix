<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function gigs()
    {
        return $this->belongsToMany('App\Gig');
    }
}
