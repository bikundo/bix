<?php

    /*
    |--------------------------------------------------------------------------
    | Model Factories
    |--------------------------------------------------------------------------
    |
    | Here you may define all of your model factories. Model factories give
    | you a convenient way to create models for testing and seeding your
    | database. Just tell the factory how a default model should look.
    |
    */

    $factory->define(App\User::class, function ($faker) {
        return [
            'name'     => $faker->name,
            'email'    => $faker->email,
            'password' => Hash::make('password'),
//        'remember_token' => str_random(10),
        ];
    });
    $factory->define(App\Tag::class, function ($faker) {
        return [
            'name'     => $faker->word,
//        'remember_token' => str_random(10),
        ];
    });
    $factory->define(App\Post::class, function ($faker) {
    $n = $faker->numberBetween($min = 1, $max = 600);
        return [
            'title'     => $faker->sentence($nbWords = 3),
            'body'      => $faker->text($maxNbChars = 1400),
            'images'    => "https://unsplash.it/500/500?image=".$n,
            'published' => $faker->boolean($chanceOfGettingTrue = 80),
            'shares'    => $faker->numberBetween($min = 1, $max = 90),
            'hits'      => $faker->numberBetween($min = 1, $max = 90),
        ];
    });

    $factory->define(App\Gig::class, function ($faker) {
        $n = $faker->numberBetween($min = 1, $max = 600);
        return [
            'name'        => $faker->sentence($nbWords = 4),
            'description' => $faker->text($maxNbChars = 700),
            'images'      => "https://unsplash.it/500/500?image=".$n,
            'url'         => $faker->url(),
            'published'   => $faker->boolean($chanceOfGettingTrue = 80),
            'likes'       => $faker->numberBetween($min = 1, $max = 90),
            'hits'        => $faker->numberBetween($min = 1, $max = 90),
        ];
    });
