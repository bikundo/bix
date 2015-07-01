<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Gig extends Model
    {
        protected $casts = [
            'published' => 'boolean',
        ];
        protected $fillable = ['name', 'description', 'url'];
    }
