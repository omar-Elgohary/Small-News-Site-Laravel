<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;

class DatabaseSeeder extends Seeder{

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(100)->create();
    }
}
