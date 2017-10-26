<?php

use App\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //php artisan db:seed


        Movie::create([
            'title' => 'Titanic',
            'year' => '1997',
            'plot' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo vel ullam architecto. Voluptate provident tempora iure dolorum cumque consequatur minima doloremque suscipit sint ut, libero, ducimus est vitae, dolor fugit?'
        ]);
    }
}
