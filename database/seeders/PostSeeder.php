<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //cancella tutti i dati della tabella Posts
        Schema::disableForeignKeyConstraints();
        //cancello tutti i dati della tabella categories
        Post::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i=0; $i < 10; $i++) { 
            $category = Category::inRandomOrder()->first();
            
            $new_post = new Post();
            $new_post->title = $faker->sentence();
            $new_post->content = $faker->text();
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->category_id = $category->id;
            $new_post->save();
        }
        
    }
}
