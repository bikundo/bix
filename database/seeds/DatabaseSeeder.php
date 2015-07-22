<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Database\Eloquent\Model;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Model::unguard();

            $this->call('OptionTableSeeder');
            // $this->call('UserTableSeeder');
            // $this->call('PostTableSeeder');
            // $this->call('GigTableSeeder');
            $this->call('TagsTableSeeder');
            $this->call('CategoriesSeeder');
            $this->call('RolesTableSeeder');  

            Model::reguard();
        }
    }
