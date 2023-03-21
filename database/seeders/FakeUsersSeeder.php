<?php

use \Illuminate\Database\Seeder;
use Illuminate\Contracts\Container\BindingResolutionException;

class FakeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,100)->create();
    }
}
