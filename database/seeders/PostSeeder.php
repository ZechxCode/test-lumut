<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'title' => 'Judul1',
                'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis mollitia, harum deserunt doloremque in sequi nesciunt earum. Atque amet dolorem nisi, enim repellat aliquam incidunt dolorum hic dolor laborum magnam?Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, deserunt? Accusamus dignissimos nihil culpa nobis mollitia cumque asperiores impedit quis distinctio inventore at saepe, odio natus quidem et totam velit.',
                'user_id' => 1,

            ],
            [
                'title' => 'Judul2',
                'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis mollitia, harum deserunt doloremque in sequi nesciunt earum. Atque amet dolorem nisi,',
                'user_id' => 2,
            ],
        ])->each(function ($post) {
            Post::create($post);
        });
    }
}
