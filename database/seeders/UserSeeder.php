<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(7)->unverified()->create();

        $users = User::all();
        $todos = Todo::pluck('id');
        // Hash::make()
        foreach ($users as $user) {
            $randomTodoId = $todos->random(2);
            $user->todos()->sync($randomTodoId);
        }
    }
}
