<?php
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = ['laravel', 'servers', 'html', 'css', 'back-end', 'front-end', 'js', 'cms', 'design', 'development'];
        foreach ($data as $key) {
            $d = new App\Category;
            $d->name = $key;
            $d->save();
        }
    }
}
