<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Schema::disableForeignKeyConstraints();
        //cancello tutti i dati della tabella categories
        Tag::truncate();
        Schema::enableForeignKeyConstraints();

        $categories = ['Html', 'JS', 'PHP', 'VueJS'];

        foreach ($categories as $category) {
            $new_tag = new Tag();
            $new_tag->name = $category;
            $new_tag->slug = Str::slug($new_tag->name);
            $new_tag->save();
        }
    }
}
