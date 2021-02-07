<?php

include __DIR__ . '/../../../../../wp-load.php';

use Phinx\Seed\AbstractSeed;
use \Faker\Factory;
use \App\Models\Posts;

class PostSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        Posts::truncate();

        $faker = Factory::create();
        $posts = [];
        for( $i = 0; $i < 20; $i++ ){
            $post_title = $faker->words('8', true);
            $post_date = $faker->date('Y-m-d H:i:s');

            $posts[] = [
                'post_author' => 1,
                'post_date' => $post_date,
                'post_date_gmt' => $post_date,
                'post_modified' => $post_date,
                'post_modified_gmt' => $post_date,
                'post_content' => $faker->paragraphs('12', true),
                'post_title' => $post_title,
                'post_status' => 'publish',
                'post_name' => str_replace(' ', '-', strtolower($post_title)),
                'comment_status' => 'open',
                'ping_status' => 'open',
                'guid' => $faker->url,
                'post_type' => $faker->randomElement(['post', 'page']),
                'to_ping' => '',
                'pinged' => '',
                'comment_count' => 0,
                'post_mime_type' => '',
                'post_parent' => 0,
                'post_content_filtered' => '',
                'post_excerpt' => '',
                'post_password' => ''
            ];
        }

        Posts::insert($posts);
    }
}
