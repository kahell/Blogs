<?php

use Illuminate\Database\Seeder;
use App\Model\User\post;
use App\Model\User\category;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(post::class, 10)->create()->each(function($post){
          $post->categories()->saveMany(factory(category::class, 4)->make());
      });
    }
}
