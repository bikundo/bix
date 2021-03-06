<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Post extends Model
    {
        protected $fillable = ['title', 'body','published'];
        protected $casts = [
            'published' => 'boolean',
        ];
        public function tags()
        {
            return $this->belongsToMany('App\Tag');
        }
    }
