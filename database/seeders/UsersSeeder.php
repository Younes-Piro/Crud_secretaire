<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('testtest')
        ]);
    }
}
