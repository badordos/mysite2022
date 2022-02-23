<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create(
             [
                 'name'=>'admin',
                 'email'=>env('ADMIN_MAIL'),
                 'password'=> Hash::make(env('ADMIN_PASS')),
                 'is_admin'=> true,
             ]
         );

        User::factory(50)->create();
    }
}
