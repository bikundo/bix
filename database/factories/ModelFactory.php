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
    $factory->define(App\Post::class, function ($faker) {
        $pics = [
            $faker->imageUrl($width = 640, $height = 480, 'technics', true, 'Faker'),
            $faker->imageUrl($width = 640, $height = 480, 'technics', true, 'Faker'),
        ];
        return [
            'title'     => $faker->sentence($nbWords = 4),
            'body'      => $faker->text($maxNbChars = 1400),
            'images'    => json_encode($pics),
            'published' => $faker->boolean($chanceOfGettingTrue = 80),
            'shares'    => $faker->numberBetween($min = 1, $max = 90),
            'hits'      => $faker->numberBetween($min = 1, $max = 90),
        ];
    });

    $factory->define(App\Gig::class, function ($faker) {
        $pics = [
            $faker->imageUrl($width = 640, $height = 480, 'technics', true, 'Faker'),
            $faker->imageUrl($width = 640, $height = 480, 'technics', true, 'Faker'),
        ];
        return [
            'name'        => $faker->sentence($nbWords = 4),
            'description' => $faker->text($maxNbChars = 700),
            'images'      => json_encode($pics),
            'url'         => $faker->url(),
            'published'   => $faker->boolean($chanceOfGettingTrue = 80),
            'likes'      => $faker->numberBetween($min = 1, $max = 90),
            'hits'        => $faker->numberBetween($min = 1, $max = 90),
        ];
    });
