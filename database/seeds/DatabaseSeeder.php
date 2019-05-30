<?php

use App\User;
use App\Order;
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
        // $this->call(UsersTableSeeder::class);
        factory(Order::class, 5)->create([
            'user_id' => function() {
                return factory(User::class)->create()->id;
            }
        ]);
    }
}
