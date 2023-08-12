<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'login' => 'admin',
            'password' => 'admin',
            'status' => 1,
            'isAdmin' => 1,
        ]);
        ArticleCategory::factory(30)->create();
        Article::factory(30)->create();
        User::factory(30)->create();

    }
}
