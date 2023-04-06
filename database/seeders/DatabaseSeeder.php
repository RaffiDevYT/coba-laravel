<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Fahmi',
        //     'email' => 'fahmiarif96@gmail.com',
        //     'password' => bcrypt('12345'),
        // ]);

        // User::create([
        //     'name' => 'Abdul',
        //     'email' => 'abdulaja@gmail.com',
        //     'password' => bcrypt('12345'),
        // ]);

        Category::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
        ]);
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Post Pertama',
        //     'slug' => 'judul-post-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisqua',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero qui magni eveniet nesciunt unde deleniti inventore labore, id non ut aliquid repellat quibusdam sequi ipsa facilis omnis fuga eum, quod minima voluptatem architecto, dolorem quo delectus! Neque numquam quam, libero labore quo sint odit expedita laborum illo quas iure praesentium, unde quaerat est dolore exercitationem soluta nostrum sed obcaecati explicabo excepturi in aliquam. Esse sint temporibus numquam praesentium cupiditate ipsum neque nobis laborum? Quas consequuntur corrupti soluta asperiores labore sunt quos fugiat optio hic, at voluptates iure ad voluptatum consectetur et itaque molestias laudantium rem commodi? Dignissimos exercitationem animi quam.',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Post Kedua',
        //     'slug' => 'judul-post-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisqua',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero qui magni eveniet nesciunt unde deleniti inventore labore, id non ut aliquid repellat quibusdam sequi ipsa facilis omnis fuga eum, quod minima voluptatem architecto, dolorem quo delectus! Neque numquam quam, libero labore quo sint odit expedita laborum illo quas iure praesentium, unde quaerat est dolore exercitationem soluta nostrum sed obcaecati explicabo excepturi in aliquam. Esse sint temporibus numquam praesentium cupiditate ipsum neque nobis laborum? Quas consequuntur corrupti soluta asperiores labore sunt quos fugiat optio hic, at voluptates iure ad voluptatum consectetur et itaque molestias laudantium rem commodi? Dignissimos exercitationem animi quam.',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Post Ketiga',
        //     'slug' => 'judul-post-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisqua',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero qui magni eveniet nesciunt unde deleniti inventore labore, id non ut aliquid repellat quibusdam sequi ipsa facilis omnis fuga eum, quod minima voluptatem architecto, dolorem quo delectus! Neque numquam quam, libero labore quo sint odit expedita laborum illo quas iure praesentium, unde quaerat est dolore exercitationem soluta nostrum sed obcaecati explicabo excepturi in aliquam. Esse sint temporibus numquam praesentium cupiditate ipsum neque nobis laborum? Quas consequuntur corrupti soluta asperiores labore sunt quos fugiat optio hic, at voluptates iure ad voluptatum consectetur et itaque molestias laudantium rem commodi? Dignissimos exercitationem animi quam.',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);
    }
}
