<?php
//
//namespace Database\Seeders;
//
//// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
//use Illuminate\Database\Seeder;
//
//class DatabaseSeeder extends Seeder
//{
//    /**
//     * Seed the application's database.
//     */
//    public function run(): void
//    {
//        // \App\Models\User::factory(10)->create();
//
//        // \App\Models\User::factory()->create([
//        //     'name' => 'Test User',
//        //     'email' => 'test@example.com',
//        // ]);
//    }
//}

use Illuminate\Database\Seeder;
use Illuminate\Contracts\Container\BindingResolutionException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);
        factory(\App\User::class,100)->create();

//        $faker = \Faker\Factory::create();
//        for($i=1;$i<=100;$i++){
//            \App\User::create(
//                [
//                   'name'=>$faker->name,
//                   'email'=>$faker->email,
//                    'password'=>bcrypt('password'),
//                ]);

//        }
    }
}

