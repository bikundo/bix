<?php

use Illuminate\Database\Seeder;
use App\Option;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'site_name'   => 'bix.io',
            'site_admin'  => 'Peter Bikundo',
            'admin_email' => 'me@bix.io',
            'admin_id'    => 1,
        ];
        foreach ($data as $key => $value) {
           $d = new Option;
           $d->option_name = $key;
           $d->option_value = $value;
           $d->save();
        }
    }
}
