<?php

use Illuminate\Database\Seeder;
use \Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 $data = ['admin','others'];
        foreach ($data as $key) {
            $d = new Role;
            $d->name = $key;
            $d->slug = $key;
            $d->description ="an ".$key;
            $d->save();
        }
        
    }
}
