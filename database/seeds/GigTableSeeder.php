<?php

    use Illuminate\Database\Seeder;

    class GigTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            factory('App\Gig', 10)->create();
        }
    }
