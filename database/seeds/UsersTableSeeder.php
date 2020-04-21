<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'ruslan@skazkin.su')->first();

        if(!$user) {
            User::create([
                'name' => 'Rus Skazkin',
                'email' => 'ruslan@skazkin.su',
                'password' => Hash::make('master'),
            ]);
        }
    }
}
