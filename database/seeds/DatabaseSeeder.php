<?php

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
        $users = factory(App\User::class, 15)->create();
        $users->each(function ($user) {
            factory(App\Post::class, 3)->create(['user_id' => $user->id]);
        });
    }
}
