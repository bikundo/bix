<?php
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $data = ['laravel', 'php', 'servers', 'html', 'css', 'composer', 'homestead', 'nginx', 'back-end', 'front-end', 'js', 'freelance'];
        foreach ($data as $key) {
            $d = new App\Tag;
            $d->name = $key;
            $d->save();
        }
    }
}
